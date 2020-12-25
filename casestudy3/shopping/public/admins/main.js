function actiondelete(event){
    event.preventDefault()
    let urlRequest = $(this).data('url');
    let that = $(this);
    // alert(urlRequest);
    Swal.fire({
        title: 'Bạn có chắc muốn xóa không?',
        text: "Bạn sẽ không thể lấy lai sản phẩm này!",
        icon: 'cảnh báo',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Có, xóa nó!'
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                type: 'GET',
                url: urlRequest,
                success:function (data){
                    if(data.code == 200) {
                        that.parent().parent().remove();
                        Swal.fire(
                            'Đã xóa!',
                            'Tệp của bạn đã bị xóa.',
                            'sự thành công'
                        )
                    }

                },
                error:function (){

                }
            });on


        }
    })
}

$(function (){
    // them su kien document neu kich vao delete
    $(document).on('click','.action_delete',actiondelete);
})
