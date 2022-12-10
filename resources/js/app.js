import './bootstrap';
import Swal from 'sweetalert2';

$('.delete-confirm').on('click', e => {
    e.preventDefault();
    Swal.fire({
        title: 'Anda yakin menghapus akun ini?',
        text: 'Anda tidak mengulang bisa proses ini',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Iya, hapus!',
    }).then(result => {
        if (result.isConfirmed) {
            Swal.fire('Telah dihapus!', 'Akun telah terhapus.', 'success');
        }
    });
});

$('.edit-account').on('click', e => {
    e.preventDefault();
    Swal.fire({
        title: 'Penyuntingan akun',
        text: 'Anda ingin menyunting akun ini?',
        icon: 'info',
        showCancelButton: true,
        confirmButtonText: 'Edit',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancel',
    }).then(result => {
        if (result.value) {
            $('#edit-account').closest('form').submit();
        }
    });
});

$('#submit').on('click', e => {
    e.preventDefault();
    Swal.fire({
        title: 'Peringatan',
        text: 'Anda yakin ingin mengubah?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Edit',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancel',
    }).then(result => {
        if (result.value) {
            $('#edit-account').closest('form').submit();
        }
    });
});

$('#submit-logo').on('click', e => {
    e.preventDefault();
    Swal.fire({
        title: 'Peringatan',
        text: 'Anda yakin ingin mengubah?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Edit',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancel',
    }).then(result => {
        if (result.value) {
            $('#edit-account').closest('form').submit();
        }
    });
});
