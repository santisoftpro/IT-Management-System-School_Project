<div class="card-body">
    <p>The type of the modal. SweetAlert comes with 4 built-in types which will show a corresponding icon animation:
        "warning", "error", "success" and "info". You can also set it as "input" to get a prompt modal. It can either
        be put in the object under the key "icon" or passed as the third parameter of the function.</p>
    <button type="button" class="btn btn-outline-success mr-1 mb-1" id="type-success">Success</button>
    <button type="button" class="btn btn-outline-info mr-1 mb-1" id="type-info">Info</button>
    <button type="button" class="btn btn-outline-warning mr-1 mb-1" id="type-warning">Warning</button>
    <button type="button" class="btn btn-outline-danger mr-1 mb-1" id="type-error">Error</button>
</div>


<script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
<script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>


<script>

    // import swal from 'sweetalert';


    swal({
        title: "Good job!",
        text: "You clicked the button!",
        icon: "success",
        button: "Aww yiss!",
    });


</script>