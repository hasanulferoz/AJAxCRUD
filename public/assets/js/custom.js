(function($){
    $(document).ready(function(){


        function allStudents(){
            $.ajax({
                url: 'all-students',
                success: function(data){
                    //alert(data);
                    $('#allUserTable').html(data);
                }
            })
        }

        allStudents();


        $('#add_btn_student').click(function(e){
            e.preventDefault();
            
            $('#add_modal_student').modal('show');
        });

        $('#add_student_form').submit(function(e){
            e.preventDefault();
            
            $.ajax({
                url:'student-store',
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(data){
                    if(data){
                        allStudents();
                        $('#add_modal_student').modal('hide');
                        swal('Success', 'Account created succssful', 'success');
    
                    }
                }
            }) 
        })

        // $(document).on('click', '#edit_user_btn', function(e){
        //     e.preventDefault();
            
            
        //     // let id = $(this).attr('edit_id');
        //     alert('hi');

        //    // $('#edit_user_modal').modal('show');
        // })



        //edit


            // Edit Modal users
            $(document).on('click', '#edit_stu_btn', function(e){
                e.preventDefault();

               // alert('hi')
    
                let id = $(this).attr('edit_id');

               // alert(id );

                $.ajax({
                    url: 'edit_students/' + id,
                    success : function(data){
                        //alert(data);
                        $('#edit_modal_student input[name="name"]').val(data.name);
                        $('#edit_modal_student input[name="email"]').val(data.email);
                        $('#edit_modal_student input[name="cell"]').val(data.cell);
                        $('#edit_modal_student input[name="uname"]').val(data.uname);
                        $('#edit_modal_student .stu_gender').html(data.gender);
                        $('#edit_modal_student #stu_edu').html(data.edu);
                        $('#edit_modal_student input[name="update_id"]').val(data.id);
                        $('#edit_modal_student').modal('show');
                    }
                })

                
    
                // $.ajax({
                //     url : 'edit-user/' + id ,
                //     success : function(data){
    
                //         $('#edit_user_modal input[name="fname"]').val(data.name);
                //         $('#edit_user_modal input[name="email"]').val(data.email);
                //         $('#edit_user_modal input[name="cell"]').val(data.cell);
                //         $('#edit_user_modal input[name="uname"]').val(data.uname);
                //         $('#edit_user_modal .user-gender ').html(data.gender);
                //         $('#edit_user_modal #edu-user').html(data.edu);
                //         $('#edit_user_modal').modal('show');
    
                //     }
                // });
    
    
    
    
    
            });

            // let edit_btn = document.querySelector('.edit_stu_btn');

            // edit_btn.addEventListener('click', (e) =>{
            //     console.log('clicked');
            // })



            $('#edit_student_form').submit(function(e){
                e.preventDefault();
                
                $.ajax({
                    url: 'update_students',
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data){
                        allStudents();
                        $('#edit_modal_student').modal('hide');
                    }
                })
            });


            $(document).on('click', '#delete_stu_btn', function(e){
                e.preventDefault();

                let id = $(this).attr('delete_id');

                swal({
                    title: 'Delete',
                    text: 'Are you sure?',
                    buttons: ['Cancel', 'Delete'],
                    dangerMode: true
                }).then(function (inc) {
                        if(inc){

                            $.ajax({
                                url: 'delete_student/' + id,
                                success: function(data){
                                    if(data){
                                        allStudents();
                                        swal({
                                            title: 'Deleted',
                                            text: 'Student deleted successfully',
                                            icon: 'success'
                                        });
                                    }
                                   
                                    
                                }
                            });
                        }else{
                            swal('Data safe');
                        }
                    });
            })

    });
})(jQuery);