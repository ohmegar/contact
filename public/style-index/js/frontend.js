$(document).ready(function () {
/* handle tables sn ค้นหาตามชื่อ-นามสกุล*/
    var tbview_sn = $('#tbview_sn').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        order: [[0, 'asc']], //คำสั่งให้เรียงจากมากไปน้อยของคอลัม 5 นับ 012345
        bFilter: false, //แสดงกล่องค้นหา
        lengthChange: true, //true,false แสดงตัวเลือกจำนวนรายการต่อหน้า
        // iDisplayLength: 50,  //กำหนด default row per page เป็น 50
        // bLengthChange: false,  //ปิด select box ที่ให้เลือก row per page
        lengthMenu: [ [ 10, 25, 50, -1 ], [ 10, 25, 50, "ทั้งหมด" ] ],
        oLanguage: {
            sSearch: 'ค้นหาตามชื่อ-นามสกุล :',
            sInfo: 'แสดงข้อมูลรายการที่ _START_ ถึง _END_ จากจำนวนข้อมูลทั้งหมด  _TOTAL_ รายการ ',
            sInfoEmpty: 'ไม่พบข้อมูล',
            sZeroRecords: 'ไม่พบข้อมูลที่ท่านค้นหา',
            sProcessing: 'กำลังประมวลผลข้อมูล',
            sInfoFiltered:  ' (จากข้อมูลทั้งหมด _MAX_ รายการ)',
            sLengthMenu: 'แสดง _MENU_ รายการ ต่อหน้า',
                oPaginate: {
                    sPrevious: '<i class=\"fa fa-angle-left\"></i>', // เปลี่ยน ในส่วนของการ control page
                    // sNext: 'รายการถัดไป',
                    sNext: '<i class=\"fa fa-angle-right\"></i>',
                            }   
                    },
        ajax: {
            // url: "http://localhost/procurement/public/datatablesdss",
            url: "data-sn/",
            data: function (d) {
                d.emp_name = $('input[name=emp_name]').val();
                }
        },
        columns: [
        {
            data: 'emp_name',
            name: 'emp_name'
        },
        {
            data: 'position_view',
            name: 'position_view'
        },
        {
            data: 'image',
            name: 'image'
        },
        {
            data: 'division',
            name: 'division'
        },
        {
            data: 'emp_type_name',
            name: 'emp_type_name'
        },
        {
            data: 'dss_phone',
            name: 'dss_phone'
        },
        {
            data: 'dss_fax',
            name: 'dss_fax'
        },
        {
            data: 'dss_mail',
            name: 'dss_mail'
        },
        {
            data: 'emp_id',
            name: 'emp_id'
        }

    ],
        columnDefs: [
            {
                targets: 0,
                render: function (data, type, row) {
                    if (row.english_name == null){
                        var data =  '<span style="color:blue">'+row.pfix_name + row.emp_name+'</span>';                                            
                    } else {
                        var data =  '<span style="color:blue">'+row.pfix_name + row.emp_name +'</span><br>'+ row.pfix_name_e + row.english_name;                    
                    }
                    return data;
                },
            },
            {
                targets: 1,
                render: function (data, type, row) {
                    if (row.image == null){
                        var data = '<center><img src="style-index/images/nophoto.png" class="img-dss"></img></center>';
                    } else {
                        var data = '<center><img src="http://hr-expertise.dss.local/storage/images/profile/'+row.image+'" class="img-dss"></img></center>';
                    }
                    return data;
                },
            },            
            {
                targets: 2,
                render: function (data, type, row) {
                    if (row.position_view == 'นักบริหาร'){
                        var data = '<center> อธิบดีกรมวิทยาศาสตร์บริการ </center>';    
                    } else if(row.position_view == 'นักบริหารต้น'){
                        var data = '<center> รองอธิบดีกรมวิทยาศาสตร์บริการ </center>';    
                    } else {
                        var data = '<center>' + row.position_view + '</center>';                    
                    }
                    return data;
                },
            },
            {
                targets: 3,
                render: function (data, type, row) {
                    if (row.sub_division == null){
                        var data = '<span style="color:blue"><i class="fa fa-map-marker"></i> '+row.division+'</span>';                    
                    } else {
                        var data = '<span style="color:blue"><i class="fa fa-map-marker"></i> '+row.division+'</span><br><i class="fa fa-tag"></i> '+row.sub_division;                    
                    }
                    return data;
                },
            },
            {
                targets: 4,
                render: function (data, type, row) {
                    var data = '<center>' + row.emp_type_name + '</center>';                    
                    return data;
                },
            },

            {
                targets: 5,
                render: function (data, type, row) {
                    if (row.dss_phone == null){
                        var data = '<center> - </center>';                    
                    } else {
                        var data = '<center>' + row.dss_phone + '</center>';                    
                    }
                    return data;
                },
            },
            {
                targets: 6,
                render: function (data, type, row) {
                    if (row.dss_fax == null){
                        var data = '<center> - </center>';                    
                    } else {
                        var data = '<center>' + row.dss_fax + '</center>';                    
                    }
                    return data;
                },
            },
            {
                targets: 7,
                render: function (data, type, row) {
                    if (row.dss_mail == null){
                        var data = '<center> - </center>';                    
                    } else {
                        var data = '<center>' + row.dss_mail + '</center>';                    
                    }
                    return data;
                },
            },
            {
                targets: 8,                
                render: function (data, type, row) {    
                    var btnView = '<button type="button" class="btn btn-outline-info btn-block" id="btViewAll" data-id="' + data + '"><i class="fa fa-eye"></i></button>';
                    return btnView;
                },
            },
        ]
    });



    $('#search-form').on('submit', function(e) {
        tbview_sn.draw();
        e.preventDefault();
    });



    (function ($) {
        $('body').on('click', '#btViewAll', function () {
            $('#modal-viewrd').modal('show');
            let id = $(this).attr('data-id');
            // console.log(id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: 'getviewrd/' + id,
                type: 'get',
                dataType: 'json',
                success: function (data) {
                // console.log(data);
                $('#id_view').val(data.rd_id );
                $('#rd_budget_view').val(data.rd_budget).trigger("change");
                $('#rd_name_view').val(data.rd_name);
                $('#rd_cat_view').val(data.rd_cat).trigger("change");
                $('#rd_contract_view').val(data.rd_contract);
                $('#rd_locat_view').val(data.rd_locat).trigger("change");
                $('#rd_tel_view').val(data.rd_tel);
                $('#rd_fax_view').val(data.rd_fax);
                $('#rd_email_view').val(data.rd_email);
                $('#rd_pic_view').val(data.rd_pic);
                $('#rd_file_view').val(data.rd_file);
    
                let picShow_view = '../storage/pic/'+data.rd_pic;
                document.getElementById("PicShow_view").setAttribute("src", picShow_view + '#embedded=true');
    
                let FileShow_view = '../storage/pdf/'+data.rd_file;
                document.getElementById("FileShow_view").setAttribute("src", FileShow_view + '#embedded=true');
    
            },
            error: function (data) {
                // console.log(data);
            }
            });
        });
    
    }(jQuery));






/* handle tables st ค้นหาตามเบอร์โทร*/
var tbview_st = $('#tbview_st').DataTable({
    responsive: true,
    processing: true,
    serverSide: true,
    order: [[0, 'asc']], //คำสั่งให้เรียงจากมากไปน้อยของคอลัม 5 นับ 012345
    bFilter: false, //แสดงกล่องค้นหา
    lengthChange: true, //true,false แสดงตัวเลือกจำนวนรายการต่อหน้า
    // iDisplayLength: 50,  //กำหนด default row per page เป็น 50
    // bLengthChange: false,  //ปิด select box ที่ให้เลือก row per page
    lengthMenu: [ [ 10, 25, 50, -1 ], [ 10, 25, 50, "ทั้งหมด" ] ],
    oLanguage: {
        sSearch: 'ค้นหาตามชื่อ-นามสกุล :',
        sInfo: 'แสดงข้อมูลรายการที่ _START_ ถึง _END_ จากจำนวนข้อมูลทั้งหมด  _TOTAL_ รายการ ',
        sInfoEmpty: 'ไม่พบข้อมูล',
        sZeroRecords: 'ไม่พบข้อมูลที่ท่านค้นหา',
        sProcessing: 'กำลังประมวลผลข้อมูล',
        sInfoFiltered:  ' (จากข้อมูลทั้งหมด _MAX_ รายการ)',
        sLengthMenu: 'แสดง _MENU_ รายการ ต่อหน้า',
            oPaginate: {
                sPrevious: '<i class=\"fa fa-angle-left\"></i>', // เปลี่ยน ในส่วนของการ control page
                // sNext: 'รายการถัดไป',
                sNext: '<i class=\"fa fa-angle-right\"></i>',
                        }   
                },
    ajax: {
        // url: "http://localhost/procurement/public/datatablesdss",
        url: "data-st/",
        data: function (d) {
            d.dss_phone = $('input[name=dss_phone]').val();
            }
    },
    columns: [
    {
        data: 'emp_name',
        name: 'emp_name'
    },
    {
        data: 'position_view',
        name: 'position_view'
    },
    {
        data: 'image',
        name: 'image'
    },
    {
        data: 'division',
        name: 'division'
    },
    {
        data: 'emp_type_name',
        name: 'emp_type_name'
    },
    {
        data: 'dss_phone',
        name: 'dss_phone'
    },
    {
        data: 'dss_fax',
        name: 'dss_fax'
    },
    {
        data: 'dss_mail',
        name: 'dss_mail'
    },
    {
        data: 'emp_id',
        name: 'emp_id'
    }

],
    columnDefs: [
        {
            targets: 0,
            render: function (data, type, row) {
                if (row.english_name == null){
                    var data =  '<span style="color:blue">'+row.pfix_name + row.emp_name+'</span>';                                            
                } else {
                    var data =  '<span style="color:blue">'+row.pfix_name + row.emp_name +'</span><br>'+ row.pfix_name_e + row.english_name;                    
                }
                return data;
            },
        },
        {
            targets: 1,
            render: function (data, type, row) {
                if (row.image == null){
                    var data = '<center><img src="style-index/images/nophoto.png" class="img-dss"></img></center>';
                } else {
                    var data = '<center><img src="http://hr-expertise.dss.local/storage/images/profile/'+row.image+'" class="img-dss"></img></center>';
                }
                return data;
            },
        },            
        {
            targets: 2,
            render: function (data, type, row) {
                if (row.position_view == 'นักบริหาร'){
                    var data = '<center> อธิบดีกรมวิทยาศาสตร์บริการ </center>';    
                } else if(row.position_view == 'นักบริหารต้น'){
                    var data = '<center> รองอธิบดีกรมวิทยาศาสตร์บริการ </center>';    
                } else {
                    var data = '<center>' + row.position_view + '</center>';                    
                }
                return data;
            },
        },
        {
            targets: 3,
            render: function (data, type, row) {
                if (row.sub_division == null){
                    var data = '<span style="color:blue"><i class="fa fa-map-marker"></i> '+row.division+'</span>';                    
                } else {
                    var data = '<span style="color:blue"><i class="fa fa-map-marker"></i> '+row.division+'</span><br><i class="fa fa-tag"></i> '+row.sub_division;                    
                }
                return data;
            },
        },
        {
            targets: 4,
            render: function (data, type, row) {
                var data = '<center>' + row.emp_type_name + '</center>';                    
                return data;
            },
        },

        {
            targets: 5,
            render: function (data, type, row) {
                if (row.dss_phone == null){
                    var data = '<center> - </center>';                    
                } else {
                    var data = '<center>' + row.dss_phone + '</center>';                    
                }
                return data;
            },
        },
        {
            targets: 6,
            render: function (data, type, row) {
                if (row.dss_fax == null){
                    var data = '<center> - </center>';                    
                } else {
                    var data = '<center>' + row.dss_fax + '</center>';                    
                }
                return data;
            },
        },
        {
            targets: 7,
            render: function (data, type, row) {
                if (row.dss_mail == null){
                    var data = '<center> - </center>';                    
                } else {
                    var data = '<center>' + row.dss_mail + '</center>';                    
                }
                return data;
            },
        },
        {
            targets: 8,                
            render: function (data, type, row) {    
                var btnView = '<button type="button" class="btn btn-outline-info btn-block" id="btViewAll" data-id="' + data + '"><i class="fa fa-eye"></i></button>';
                return btnView;
            },
        },
    ]
});


$('#search-form').on('submit', function(e) {
    tbview_st.draw();
    e.preventDefault();
});



});