import Swal from "sweetalert2";

export function confirmDelete(form_name, id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById(form_name + "-" + id).submit();
        }
    });
}

window.confirmDelete = confirmDelete;
