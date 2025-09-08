$(document).ready(function () {
    /* handle tables sn ค้นหาตามชื่อ-นามสกุล*/
    var tbview_sn = $("#tbview_sn").DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        // order: [2, 'ASC'], //คำสั่งให้เรียงจากมากไปน้อยของคอลัม 5 นับ 012345
        order: [
            [0, "DESC"],
            [1, "DESC"],
            [2, "DESC"],
            // [5, "ASC"],
            [6, "ASC"],
        ], //คำสั่งให้เรียงจากมากไปน้อยของคอลัม 5 นับ 012345
        rowGroup: {
            dataSrc: ["division", "sub_division"],
            emptyDataGroup: null, //ไม่แสดงข้อความถ้าไม่มีข้อมูล
            startRender: function (rows, group, level) {
                if (level == 0) {
                    return (
                        '<span style="color:#00008B"><i class="fa fa-map-marker"></i> ' +
                        group +
                        "</span>"
                    );
                } else {
                    return group;
                }
            },
        },
        bFilter: false, //แสดงกล่องค้นหา
        lengthChange: true, //true,false แสดงตัวเลือกจำนวนรายการต่อหน้า
        // iDisplayLength: 50,  //กำหนด default row per page เป็น 50
        // bLengthChange: false,  //ปิด select box ที่ให้เลือก row per page
        lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, "ทั้งหมด"],
        ], // -1 คือทั้งหมด
        oLanguage: {
            sSearch: "ค้นหาตามชื่อ-นามสกุล :",
            sInfo: "แสดงข้อมูลรายการที่ _START_ ถึง _END_ จากจำนวนข้อมูลทั้งหมด  _TOTAL_ รายการ ",
            sInfoEmpty: "ไม่พบข้อมูล",
            sZeroRecords: "ไม่พบข้อมูลที่ท่านค้นหา",
            sProcessing: "กำลังประมวลผลข้อมูล",
            sInfoFiltered: " (จากข้อมูลทั้งหมด _MAX_ รายการ)",
            sLengthMenu: "แสดง _MENU_ รายการ ต่อหน้า",
            oPaginate: {
                sPrevious: '<i class="fa fa-angle-left"></i>', // เปลี่ยน ในส่วนของการ control page
                // sNext: 'รายการถัดไป',
                sNext: '<i class="fa fa-angle-right"></i>',
            },
        },
        ajax: {
            // url: "http://localhost/procurement/public/datatablesdss",
            url: "data-sn/",
            data: function (d) {
                d.emp_name = $("input[name=emp_name]").val();
            },
        },
        columns: [{
                data: "division",
                name: "division",
            },
            {
                data: "sub_division",
                name: "sub_division",
            },
            {
                data: "ceo_flg",
                name: "ceo_flg",
            },
            {
                data: "emp_name",
                name: "emp_name",
            },
            {
                data: "image",
                name: "image",
            },
            {
                data: "position_view",
                name: "position_view",
            },
            {
                data: "emp_type_name",
                name: "emp_type_name",
            },
            {
                data: "dss_phone",
                name: "dss_phone",
            },
            {
                data: "dss_fax",
                name: "dss_fax",
            },
            {
                data: "dss_mail",
                name: "dss_mail",
            },
            {
                data: "dss_location",
                name: "dss_location",
            },
        ],
        columnDefs: [
            // ซ่อนข้อมูลคอลัม 1-2
            {
                targets: [0, 1, 2],
                visible: false,
            },
            {
                targets: 0,
                render: function (data, type, row) {
                    if (row.division == null) {
                        var data = "<center> - </center>";
                    } else {
                        var data = "<center>" + row.division + "</center>";
                    }
                    return data;
                },
            },
            {
                targets: 1,
                render: function (data, type, row) {
                    if (row.sub_division == null) {
                        var data = "<center> - </center>";
                    } else {
                        var data = "<center>" + row.sub_division + "</center>";
                    }
                    return data;
                },
            },
            {
                targets: 3,
                render: function (data, type, row) {

                    if (row.ceo_position == 'อื่นๆ') {
                        var dataCeo = "";
                    } else {
                        var dataCeo = '<br><span style="color:#750000"><b>' +
                            row.ceo_position +
                            "</b></span>";
                    }


                    if (row.english_name == null) {
                        var data =
                            '<b><span style="color:DarkBlue">' +
                            row.pfix_name +
                            row.emp_name +
                            '</b></span><br><span style="color:MediumVioletRed ">Emp. ID : ' +
                            row.emp_id +
                            "</span>";
                    } else {
                        var data =
                            '<b><span style="color:DarkBlue">' +
                            row.pfix_name +
                            row.emp_name +
                            "</b></span><br>" +
                            row.pfix_name_e +
                            row.english_name +
                            '<br><span style="color:MediumVioletRed ">Emp. ID : ' +
                            row.emp_id +
                            "</span>";
                    }


                    return data + dataCeo;
                },
            },
            {
                targets: 4,
                render: function (data, type, row) {
                    if (row.image == null) {
                        var data =
                            '<center><img src="style-index/images/nophoto.png" class="img-dss"></img></center>';
                    } else {
                        var data =
                            '<center><img src="http://hr-expertise.dss.local/storage/images/profile/' +
                            row.image +
                            '" class="img-dss"></img></center>';
                    }
                    return data;
                },
            },
            {
                targets: 5,
                render: function (data, type, row) {
                    if (row.position_view == "นักบริหาร") {
                        var data =
                            "<center> อธิบดีกรมวิทยาศาสตร์บริการ </center>";
                    } else if (row.position_view == "นักบริหารต้น") {
                        var data =
                            "<center> รองอธิบดีกรมวิทยาศาสตร์บริการ </center>";
                    } else {
                        var data = "<center>" + row.position_view + "</center>";
                    }
                    return data;
                },
            },
            {
                targets: 6,
                render: function (data, type, row) {
                    var data = "<center>" + row.emp_type_name + "</center>";
                    return data;
                },
            },
            {
                targets: 7,
                render: function (data, type, row) {
                    if (row.dss_phone == null) {
                        var data = "<center> - </center>";
                    } else {
                        var data = "<center>" + row.dss_phone + "</center>";
                    }
                    return data;
                },
            },
            {
                targets: 8,
                render: function (data, type, row) {
                    if (row.dss_fax == null) {
                        var data = "<center> - </center>";
                    } else {
                        var data = "<center>" + row.dss_fax + "</center>";
                    }
                    return data;
                },
            },
            {
                targets: 9,
                render: function (data, type, row) {
                    if (row.dss_mail == null) {
                        var data = "<center> - </center>";
                    } else {
                        var data = "<center>" + row.dss_mail + "</center>";
                    }
                    return data;
                },
            },
            {
                targets: 10,
                render: function (data, type, row) {
                    if (row.dss_location == null) {
                        var data = "<center> - </center>";
                    } else {
                        var data = "<center>" + row.dss_location + "</center>";
                    }
                    return data;
                },
            },
        ],
    });

    $("#search-form").on("submit", function (e) {
        tbview_sn.draw();
        e.preventDefault();
    });

    // ------------------------------------------------------------------

    /* handle tables st ค้นหาตามเบอร์โทร*/
    var tbview_st = $("#tbview_st").DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        order: [
            [0, "DESC"],
            [1, "DESC"],
            [2, "DESC"],
            // [5, "ASC"],
            [6, "ASC"],
        ], //คำสั่งให้เรียงจากมากไปน้อยของคอลัม 5 นับ 012345
        rowGroup: {
            dataSrc: ["division", "sub_division"],
            emptyDataGroup: null, //ไม่แสดงข้อความถ้าไม่มีข้อมูล
            startRender: function (rows, group, level) {
                if (level == 0) {
                    return (
                        '<span style="color:#00008B"><i class="fa fa-map-marker"></i> ' +
                        group +
                        "</span>"
                    );
                } else {
                    return group;
                }
            },
        },
        bFilter: false, //แสดงกล่องค้นหา
        lengthChange: true, //true,false แสดงตัวเลือกจำนวนรายการต่อหน้า
        // iDisplayLength: 50,  //กำหนด default row per page เป็น 50
        // bLengthChange: false,  //ปิด select box ที่ให้เลือก row per page
        lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, "ทั้งหมด"],
        ],
        oLanguage: {
            sSearch: "ค้นหาตามชื่อ-นามสกุล :",
            sInfo: "แสดงข้อมูลรายการที่ _START_ ถึง _END_ จากจำนวนข้อมูลทั้งหมด  _TOTAL_ รายการ ",
            sInfoEmpty: "ไม่พบข้อมูล",
            sZeroRecords: "ไม่พบข้อมูลที่ท่านค้นหา",
            sProcessing: "กำลังประมวลผลข้อมูล",
            sInfoFiltered: " (จากข้อมูลทั้งหมด _MAX_ รายการ)",
            sLengthMenu: "แสดง _MENU_ รายการ ต่อหน้า",
            oPaginate: {
                sPrevious: '<i class="fa fa-angle-left"></i>', // เปลี่ยน ในส่วนของการ control page
                // sNext: 'รายการถัดไป',
                sNext: '<i class="fa fa-angle-right"></i>',
            },
        },
        ajax: {
            // url: "http://localhost/procurement/public/datatablesdss",
            url: "data-st/",
            data: function (d) {
                d.dss_phone = $("input[name=dss_phone]").val();
            },
        },
        columns: [{
                data: "division",
                name: "division",
            },
            {
                data: "sub_division",
                name: "sub_division",
            },
            {
                data: "ceo_flg",
                name: "ceo_flg",
            },
            {
                data: "emp_name",
                name: "emp_name",
            },
            {
                data: "image",
                name: "image",
            },
            {
                data: "position_view",
                name: "position_view",
            },
            {
                data: "emp_type_name",
                name: "emp_type_name",
            },
            {
                data: "dss_phone",
                name: "dss_phone",
            },
            {
                data: "dss_fax",
                name: "dss_fax",
            },
            {
                data: "dss_mail",
                name: "dss_mail",
            },
            {
                data: "dss_location",
                name: "dss_location",
            },
        ],
        columnDefs: [
            // ซ่อนข้อมูลคอลัม 1-2
            {
                targets: [0, 1, 2],
                visible: false,
            },
            {
                targets: 0,
                render: function (data, type, row) {
                    if (row.division == null) {
                        var data = "<center> - </center>";
                    } else {
                        var data = "<center>" + row.division + "</center>";
                    }
                    return data;
                },
            },
            {
                targets: 1,
                render: function (data, type, row) {
                    if (row.sub_division == null) {
                        var data = "<center> - </center>";
                    } else {
                        var data = "<center>" + row.sub_division + "</center>";
                    }
                    return data;
                },
            },
            {
                targets: 3,
                render: function (data, type, row) {

                    if (row.ceo_position == 'อื่นๆ') {
                        var dataCeo = "";
                    } else {
                        var dataCeo = '<br><span style="color:#750000"><b>' +
                            row.ceo_position +
                            "</b></span>";
                    }


                    if (row.english_name == null) {
                        var data =
                            '<b><span style="color:DarkBlue">' +
                            row.pfix_name +
                            row.emp_name +
                            '</b></span><br><span style="color:MediumVioletRed ">Emp. ID : ' +
                            row.emp_id +
                            "</span>";
                    } else {
                        var data =
                            '<b><span style="color:DarkBlue">' +
                            row.pfix_name +
                            row.emp_name +
                            "</b></span><br>" +
                            row.pfix_name_e +
                            row.english_name +
                            '<br><span style="color:MediumVioletRed ">Emp. ID : ' +
                            row.emp_id +
                            "</span>";
                    }


                    return data + dataCeo;
                },
            },
            {
                targets: 4,
                render: function (data, type, row) {
                    if (row.image == null) {
                        var data =
                            '<center><img src="style-index/images/nophoto.png" class="img-dss"></img></center>';
                    } else {
                        var data =
                            '<center><img src="http://hr-expertise.dss.local/storage/images/profile/' +
                            row.image +
                            '" class="img-dss"></img></center>';
                    }
                    return data;
                },
            },
            {
                targets: 5,
                render: function (data, type, row) {
                    if (row.position_view == "นักบริหาร") {
                        var data =
                            "<center> อธิบดีกรมวิทยาศาสตร์บริการ </center>";
                    } else if (row.position_view == "นักบริหารต้น") {
                        var data =
                            "<center> รองอธิบดีกรมวิทยาศาสตร์บริการ </center>";
                    } else {
                        var data = "<center>" + row.position_view + "</center>";
                    }
                    return data;
                },
            },
            {
                targets: 6,
                render: function (data, type, row) {
                    var data = "<center>" + row.emp_type_name + "</center>";
                    return data;
                },
            },
            {
                targets: 7,
                render: function (data, type, row) {
                    if (row.dss_phone == null) {
                        var data = "<center> - </center>";
                    } else {
                        var data = "<center>" + row.dss_phone + "</center>";
                    }
                    return data;
                },
            },
            {
                targets: 8,
                render: function (data, type, row) {
                    if (row.dss_fax == null) {
                        var data = "<center> - </center>";
                    } else {
                        var data = "<center>" + row.dss_fax + "</center>";
                    }
                    return data;
                },
            },
            {
                targets: 9,
                render: function (data, type, row) {
                    if (row.dss_mail == null) {
                        var data = "<center> - </center>";
                    } else {
                        var data = "<center>" + row.dss_mail + "</center>";
                    }
                    return data;
                },
            },
            {
                targets: 10,
                render: function (data, type, row) {
                    if (row.dss_location == null) {
                        var data = "<center> - </center>";
                    } else {
                        var data = "<center>" + row.dss_location + "</center>";
                    }
                    return data;
                },
            },
        ],
    });

    $("#search-form").on("submit", function (e) {
        tbview_st.draw();
        e.preventDefault();
    });

    // ------------------------------------------------------------------


    /* handle tables so ค้นหาตามหน่วยงาน*/
    var tbview_so = $("#tbview_so").DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        // order: [2, 'ASC'], //คำสั่งให้เรียงจากมากไปน้อยของคอลัม 5 นับ 012345
        order: [
            [0, "DESC"],
            [1, "DESC"],
            [2, "DESC"],
            // [5, "ASC"],
            [6, "ASC"],
        ], //คำสั่งให้เรียงจากมากไปน้อยของคอลัม 5 นับ 012345
        rowGroup: {
            dataSrc: ["division", "sub_division"],
            emptyDataGroup: "ส่วนกลางของสังกัด", //ไม่แสดงข้อความถ้าไม่มีข้อมูล
            startRender: function (rows, group, level) {
                if (level == 0) {
                    return (
                        '<span style="color:#00008B"><i class="fa fa-map-marker"></i> ' +
                        group +
                        "</span> (" +
                        rows.count() +
                        " คน)"
                    );
                } else {
                    return (
                        '<span style="color:#000000">' +
                        group +
                        "</span> (" +
                        rows.count() +
                        " คน)"
                    );
                }
            },
        },

        // startRender: function ( rows, group, level ) {
        //     if (( level == 0 ) != '') {
        //         return '<span style="color:#00008B"><i class="fa fa-map-marker"></i> ' + group + '</span> ('+rows.count()+' คน)';
        //     } else if (( level == 1 ) == null){
        //         // return group + ' ('+rows.count()+' คน)';
        //         return rows.style('none');
        //     } else {
        //         return '<span style="color:#000000">' + group + '</span> ('+rows.count()+' คน)';
        //     }
        //     }

        bFilter: false, //แสดงกล่องค้นหา
        lengthChange: true, //true,false แสดงตัวเลือกจำนวนรายการต่อหน้า
        // iDisplayLength: 50,  //กำหนด default row per page เป็น 50
        // bLengthChange: false,  //ปิด select box ที่ให้เลือก row per page
        lengthMenu: [
            [-1, 10, 25, 50],
            ["ทั้งหมด", 10, 25, 50],
        ], // -1 คือทั้งหมด
        oLanguage: {
            sSearch: "ค้นหาตามชื่อ-นามสกุล :",
            sInfo: "แสดงข้อมูลรายการที่ _START_ ถึง _END_ จากจำนวนข้อมูลทั้งหมด  _TOTAL_ รายการ ",
            sInfoEmpty: "ไม่พบข้อมูล",
            sZeroRecords: "ไม่พบข้อมูลที่ท่านค้นหา",
            sProcessing: "กำลังประมวลผลข้อมูล",
            sInfoFiltered: " (จากข้อมูลทั้งหมด _MAX_ รายการ)",
            sLengthMenu: "แสดง _MENU_ รายการ ต่อหน้า",
            oPaginate: {
                sPrevious: '<i class="fa fa-angle-left"></i>', // เปลี่ยน ในส่วนของการ control page
                // sNext: 'รายการถัดไป',
                sNext: '<i class="fa fa-angle-right"></i>',
            },
        },
        ajax: {
            // url: "http://localhost/procurement/public/datatablesdss",
            url: "data-so/",
            data: function (d) {
                d.division = $("#division").val();
            },
        },
        columns: [{
                data: "division",
                name: "division",
            },
            {
                data: "sub_division",
                name: "sub_division",
            },
            {
                data: "ceo_flg",
                name: "ceo_flg",
            },
            {
                data: "emp_name",
                name: "emp_name",
            },
            {
                data: "image",
                name: "image",
            },
            {
                data: "position_view",
                name: "position_view",
            },
            {
                data: "emp_type_name",
                name: "emp_type_name",
            },
            {
                data: "dss_phone",
                name: "dss_phone",
            },
            {
                data: "dss_fax",
                name: "dss_fax",
            },
            {
                data: "dss_mail",
                name: "dss_mail",
            },
            {
                data: "dss_location",
                name: "dss_location",
            },
        ],
        columnDefs: [
            // ซ่อนข้อมูลคอลัม 1-3
            {
                targets: [0, 1, 2],
                visible: false,
            },
            {
                targets: 0,
                render: function (data, type, row) {
                    if (row.division == null) {
                        var data = "<center> - </center>";
                    } else {
                        var data = "<center>" + row.division + "</center>";
                    }
                    return data;
                },
            },
            {
                targets: 1,
                render: function (data, type, row) {
                    if (row.sub_division == null) {
                        var data = "<center> - </center>";
                    } else {
                        var data = "<center>" + row.sub_division + "</center>";
                    }
                    return data;
                },
            },
            // {
            //     targets: 2,
            //     render: function (data, type, row) {
            //         if (row.show_order == null) {
            //             var data = "";
            //         } else {
            //             var data = '<span style="color:Indigo"><b>' +
            //                 row.show_order +
            //                 "</b></span>";
            //         }
            //         return data;
            //     },
            // },
            {
                targets: 3,
                render: function (data, type, row) {

                    if (row.ceo_position == 'อื่นๆ') {
                        var dataCeo = "";
                    } else {
                        var dataCeo = '<br><span style="color:#750000"><b>' +
                            row.ceo_position +
                            "</b></span>";
                    }


                    if (row.english_name == null) {
                        var data =
                            '<b><span style="color:DarkBlue">' +
                            row.pfix_name +
                            row.emp_name +
                            '</b></span><br><span style="color:MediumVioletRed ">Emp. ID : ' +
                            row.emp_id +
                            "</span>";
                    } else {
                        var data =
                            '<b><span style="color:DarkBlue">' +
                            row.pfix_name +
                            row.emp_name +
                            "</b></span><br>" +
                            row.pfix_name_e +
                            row.english_name +
                            '<br><span style="color:MediumVioletRed ">Emp. ID : ' +
                            row.emp_id +
                            "</span>";
                    }


                    return data + dataCeo;
                },
            },
            {
                targets: 4,
                render: function (data, type, row) {
                    if (row.image == null) {
                        var data =
                            '<center><img src="style-index/images/nophoto.png" class="img-dss"></img></center>';
                    } else {
                        var data =
                            '<center><img src="http://hr-expertise.dss.local/storage/images/profile/' +
                            row.image +
                            '" class="img-dss"></img></center>';
                    }
                    return data;
                },
            },
            {
                targets: 5,
                render: function (data, type, row) {
                    if (row.position_view == "นักบริหาร") {
                        var data =
                            "<center> อธิบดีกรมวิทยาศาสตร์บริการ </center>";
                    } else if (row.position_view == "นักบริหารต้น") {
                        var data =
                            "<center> รองอธิบดีกรมวิทยาศาสตร์บริการ </center>";
                    } else {
                        var data = "<center>" + row.position_view + "</center>";
                    }

                    return data;
                },
            },
            {
                targets: 6,
                render: function (data, type, row) {
                    var data = "<center>" + row.emp_type_name + "</center>";
                    return data;
                },
            },
            {
                targets: 7,
                render: function (data, type, row) {
                    if (row.dss_phone == null) {
                        var data = "<center> - </center>";
                    } else {
                        var data = "<center>" + row.dss_phone + "</center>";
                    }
                    return data;
                },
            },
            {
                targets: 8,
                render: function (data, type, row) {
                    if (row.dss_fax == null) {
                        var data = "<center> - </center>";
                    } else {
                        var data = "<center>" + row.dss_fax + "</center>";
                    }
                    return data;
                },
            },
            {
                targets: 9,
                render: function (data, type, row) {
                    if (row.dss_mail == null) {
                        var data = "<center> - </center>";
                    } else {
                        var data = "<center>" + row.dss_mail + "</center>";
                    }
                    return data;
                },
            },
            {
                targets: 10,
                render: function (data, type, row) {
                    if (row.dss_location == null) {
                        var data = "<center> - </center>";
                    } else {
                        var data = "<center>" + row.dss_location + "</center>";
                    }
                    return data;
                },
            },
        ],
    });

    $("#search-form").on("submit", function (e) {
        tbview_so.draw();
        e.preventDefault();
    });
});
