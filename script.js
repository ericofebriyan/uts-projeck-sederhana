document.addEventListener('DOMContentloaded' , function() {
    const deletebuttons = document.querySelectorAll('.deletBtn');


    deletebuttons.forEach(function(button){
        button.addEventListener('click'),function() {
            const index = button.getAttribute('data-index');
        }
    });

    function deletejadwal(index) {
        fetch('delet_jadwal.php' ,{
               method: 'POST',
               headers:{
                'content-type' : 'application/json'
               },
               body: JSON.stringify({ index: index})
        })
        .then(Response => Response.json())
        .then(data => {
            if(data.success){
                alert('jadwal berhasil di hapus');
                location.reload();
            }else{
                alert('gagal menghapus jadwal');
            }
        });
    }
});