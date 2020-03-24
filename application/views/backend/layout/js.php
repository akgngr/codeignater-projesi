<script>
    $(document).ready(function(){
        $('.sidenav').sidenav();
        $('.collapsible').collapsible();
        $('.dropdown-trigger').dropdown({
            belowOrigin: true,
            coverTrigger: false,
            constrainWidth: false
        });
        $('.tabs').tabs();

        $('select').formSelect();

        M.textareaAutoResize($('#description'));
        M.textareaAutoResize($('#body'));
    });




</script>
