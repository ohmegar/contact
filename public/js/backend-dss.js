$(document).ready(function () {
/* handle tables */
    var tbview = $('#doc-tbviewall').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        order: [[4, 'desc']], //คำสั่งให้เรียงจากมากไปน้อยของคอลัม 5 นับ 012345
        bFilter: false, //แสดงกล่องค้นหา
        lengthChange: true, //true,false แสดงตัวเลือกจำนวนรายการต่อหน้า
        // iDisplayLength: 50,  //กำหนด default row per page เป็น 50
        // bLengthChange: false,  //ปิด select box ที่ให้เลือก row per page
        lengthMenu: [ [ 10, 25, 50, -1 ], [ 10, 25, 50, "ทั้งหมด" ] ],
        oLanguage: {
            sSearch: 'ค้นหาตามชื่อเรื่อง หรือเลขที่หนังสือ :',
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
            url: "../datatablesviewall",
            data: function (d) {
                d.l_name = $('input[name=l_name]').val();
                }
        },
        columns: [
        {
            data: 'l_name',
            name: 'l_name'
        },
        {
            data: 'l_url_short',
            name: 'l_url_short'
        },
        {
            data: 'hits',
            name: 'hits'
        },
        {
            data: 'l_user',
            name: 'l_user'
        },
        {
            data: 'created_at',
            name: 'created_at'
        },
        {
            data: 'l_code',
            name: 'l_code'
        }

    ],
        columnDefs: [
            {
                targets: 1,
                render: function (data, type, row) {
                    var resultlink = '<a href='+data+'>'+data+'</a>'; 
                    return resultlink;
                },
            },
            {
                targets: 2,
                render: function (data, type, row) {
                    var resulthits = '<center>'+data+'</center>'; 
                    return resulthits;
                },
            },
            {
                targets: 3,
                render: function (data, type, row) {
                    var resultuser = '<center>'+data+'</center>'; 
                    return resultuser;
                },
            },
            {
                targets: 4,
                render: function (data, type, row) {
                    var strYearold = data.substring(0, 4);
                    var strYear543 = 543; 
                    var strYear = Number(strYearold) + strYear543;
                    var strMonth = Number(data.substring(5, 7));
                    var strDay= data.substring(8, 10);
                    // $strHour= date("H",strtotime(data));
                    // $strMinute= date("i",strtotime(data));
                    // $strSeconds= date("s",strtotime(data));
                    var strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                    var strMonthThai = strMonthCut[strMonth];
                    //result = "$strDay $strMonthThai $strYear $strHour:$strMinute";
                    var resultdate = '<center>'+strDay+' '+strMonthThai +' '+strYear+'</center>'; 
                    return resultdate;
                },
            },
            {
                targets: 5,                
                render: function (data, type, row) {      
                    // var btnView = '<button type="button" class="btn btn-outline-info btn-block" id="btView" data-id="' + data + '"><i class="fa fa-search"></i></button>';
                    var btnView = '<a href="../backend/v/'+ data +'" role="button" data-id="' + data + '" id="btView" class="btn btn-outline-info btn-block"><i class="fa fa-search"></i></a> ';
                    return btnView;
                },
            },
    ]
    });



    $('#search-form').on('submit', function(e) {
        tbview.draw();
        e.preventDefault();
    });


// (function ($) {
//     $('body').on('click', '#btViewAll', function () {    
//         // $('#overlay-edit-building').html(overlay);
//         $('#modal-viewall').modal('show');
//         let id = $(this).attr('data-id');
//         // console.log(id);
//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             }
//         });
//         $.ajax({
//             url: 'indexgetviewall/' + id,
//             type: 'get',
//             dataType: 'json',
//             success: function (data) {
//             // console.log(data);
//                 $('#l_id_view_all').val(data.l_id);
//                 $('#l_name_view_all').val(data.l_name);
//                 $('#l_url_view_all').val(data.l_url);
//                 $('#l_url_short_view_all').val(data.l_url_short);
//                 $('#hits_view_all').val(data.hits);
//                 $('#l_user_view_all').val(data.l_user);
//                 $('#l_code_user_view_all').val(data.l_code_user);
//                 $('#l_status_view_all').val(data.l_status);
//         },
//         error: function (data) {
//             // console.log(data);
//         }
//         });
//     });

// }(jQuery));


});


// ----------------------------------------------------------------------------------------


$(document).ready(function () {
    /* handle tables */
        var tbview = $('#doc-tbview').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            order: [[6, 'desc']], //คำสั่งให้เรียงจากมากไปน้อยของคอลัม 5 นับ 012345
            bFilter: false, //แสดงกล่องค้นหา
            lengthChange: true, //true,false แสดงตัวเลือกจำนวนรายการต่อหน้า
            // iDisplayLength: 50,  //กำหนด default row per page เป็น 50
            // bLengthChange: false,  //ปิด select box ที่ให้เลือก row per page
            lengthMenu: [ [ 10, 25, 50, -1 ], [ 10, 25, 50, "ทั้งหมด" ] ],
            oLanguage: {
                sSearch: 'ค้นหาตามชื่อเรื่อง หรือเลขที่หนังสือ :',
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
                url: "../datatablesview",
                data: function (d) {
                    d.l_name = $('input[name=l_name]').val();
                    }
            },
            columns: [
            {
                data: 'l_name',
                name: 'l_name'
            },
            {
                data: 'l_url_short',
                name: 'l_url_short'
            },
            {
                data: 'hits',
                name: 'hits'
            },
            {
                data: 'updated_at',
                name: 'updated_at'
            },
            {
                data: 'l_status',
                name: 'l_status'
            },
            {
                data: 'l_id',
                name: 'l_id'
            },
            {
                data: 'l_id',
                name: 'l_id'
            },
            {
                data: 'l_code',
                name: 'l_code'
            }    
        ],
            columnDefs: [
                {
                    targets: 1,
                    render: function (data, type, row) {
                        var resultlink = '<a href='+data+'>'+data+'</a>'; 
                        return resultlink;
                    },
                },
                {
                    targets: 2,
                    render: function (data, type, row) {
                        var resulthits = '<center>'+data+'</center>'; 
                        return resulthits;
                    },
                },
                {
                    targets: 3,
                    render: function (data, type, row) {
                        var strYearold = data.substring(0, 4);
                        var strYear543 = 543; 
                        var strYear = Number(strYearold) + strYear543;
                        var strMonth = Number(data.substring(5, 7));
                        var strDay= data.substring(8, 10);
                        // $strHour= date("H",strtotime(data));
                        // $strMinute= date("i",strtotime(data));
                        // $strSeconds= date("s",strtotime(data));
                        var strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                        var strMonthThai = strMonthCut[strMonth];
                        //result = "$strDay $strMonthThai $strYear $strHour:$strMinute";
                        var resultdate = '<center>'+strDay+' '+strMonthThai +' '+strYear+'</center>'; 
                        return resultdate;
                    },
                },
                {
                    targets: 4,
                    render: function (data, type, row) {
                        var status = data===null ? 'info' : data===1 ? 'success' : data===2 ? 'danger' :'warning';
                        var strStatus = data===null ? '<i class="fas fa-clock"></i> ไม่ระบุ' : data===1 ? '<i class="fas fa-check"></i> เผยแพร่' : data===2 ? '<i class="fas fa-times"></i> ไม่เผยแพร่' : 'ไม่มีข้อมูล';
                        var result = '<center><span class="badge badge-'+status+'">'+strStatus+'</span></center>';
                        return result;
                    },
                },    
                {
                    targets: 5,                
                    render: function (data, type, row) {    
                        var btnDel = '<button type="button" class="btn btn-outline-danger btn-block" id="btDel" data-id="' + data + '"><i class="fa fa-trash"></i></button>';
                        return btnDel;
                    },
                },
                {
                    targets: 6,                
                    render: function (data, type, row) {    
                        var btnUpdate = '<button type="button" class="btn btn-outline-warning btn-block" id="btEdit" data-id="' + data + '"><i class="fa fa-edit"></i></button>';
                        return btnUpdate;
                    },
                },        
                {
                    targets: 7,                
                    render: function (data, type, row) {      
                        // var btnView = '<button type="button" class="btn btn-outline-info btn-block" id="btView" data-id="' + data + '"><i class="fa fa-search"></i></button>';
                        var btnView = '<a href="../backend/vs/'+ data +'" role="button" data-id="' + data + '" id="btView" class="btn btn-outline-info btn-block"><i class="fa fa-search"></i></a> ';
                        return btnView;
                    },
                },
            ]
        });
    
    
    
        $('#search-form').on('submit', function(e) {
            tbview.draw();
            e.preventDefault();
        });
    
    


    (function ($) {
        $('body').on('click', '#btEdit', function () {
            // $('#overlay-edit-building').html(overlay);
            $('#modal-edit').modal('show');
            let id = $(this).attr('data-id');
            // console.log(id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '../indexgetviewall/' + id,
                type: 'get',
                dataType: 'json',
                success: function (data) {
                // console.log(data);
                    $('#l_id_update').val(data.l_id);
                    $('#l_name_update').val(data.l_name);
                    $('#l_url_update').val(data.l_url);
                    $('#l_url_short_update').val(data.l_url_short);
                    $('#hits_update').val(data.hits);
                    $('#l_user_update').val(data.l_user);
                    $('#l_code_user_update').val(data.l_code_user);
                    $('#l_status_update1').attr('checked', (data.l_status == "1"));
                    $('#l_status_update2').attr('checked', (data.l_status == "2"));
            },
            error: function (data) {
                // console.log(data);
            }
            });
        });
    
    }(jQuery));
    



    (function ($) {
        $('body').on('click', '#btDel', function () {    
            // $('#overlay-edit-building').html(overlay);
            $('#modal-del').modal('show');
            let id = $(this).attr('data-id');
            // console.log(id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '../indexgetviewall/' + id,
                type: 'get',
                dataType: 'json',
                success: function (data) {
                // console.log(data);
                    $('#l_id_cfdel').val(data.l_id);    
            },
    
            error: function (data) {
                // console.log(data);
            }
            });
        });
    
    }(jQuery));



    (function ($) {
    $('body').on('click', '#l_url_short_view_copy', function () {    
        $('#modal-copyLink').modal('show');
        // let dataurl = $(this).attr('dataurl');
        // console.log(dataurl);
    });

    }(jQuery));




    
});