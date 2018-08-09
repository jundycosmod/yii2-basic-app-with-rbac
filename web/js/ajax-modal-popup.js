$(function () {
    //get the click of modal button to create / update item
    //we get the button by class not by ID because you can only have one id on a page and you can
    //have multiple classes therefore you can have multiple open modal buttons on a page all with or without
    //the same link.
//we use on so the dom element can be called again if they are nested, otherwise when we load the content once it kills the dom element and wont let you load anther modal on click without a page refresh
    $(document).on('click', '.showModalButton', function () {
        //check if the modal is open. if it's open just reload content not whole modal
        //also this allows you to nest buttons inside of modals to reload the content it is in
        //the if else are intentionally separated instead of put into a function to get the 
        //button since it is using a class not an #id so there are many of them and we need
        //to ensure we get the right button and content. 
//        if ($('#modal').data('bs.modal').isShown) {
//            $('#modal').find('#modalContent')
//                    .load($(this).attr('value'));
//            //dynamiclly set the header for the modal
//            document.getElementById('modalHeader').innerHTML = '<h4>' + $(this).attr('title') + '</h4>';
//        } else {
        //if modal isn't open; open it and load content
        //console.log($(this).attr('value'));
        //var iframe = "<";
//        $('#modalContent').dialog({
//            width: 800,
//            height: 400,
//            modal: true,
//            open: function (ev, ui) {
//                $('#frame').attr('src', $(this).attr('value'));
//            },
//            close: function (ev, ui) {
//                $('#frame').attr('src', '');
//
//                $.ajax({
//                    url: '#',
//                    type: 'POST',
//                    success: function (data) {
//
//                        //TODO polish this
//                        /*if($('.ui-dialog-titlebar-close').data('clicked')) {
//                         if( method == 'create'){bootbox.alert('Department Successfully Added.');}
//                         else{bootbox.alert('Department Successfully Edited.');}
//                         }     */
//
//                        var sel = '#' + idlabel + '-opt';
//                        $(sel).html(data);
//                        var selChild = $(sel).children('select').attr('id');
//
//                        $(sel).append('<span class=\'help-block error\' id=\' ' + selChild + '_em_\' style=\'display: none;\'></span>');
//                        $('#' + selChild).chosen({no_results_text: 'Add', with_buttons: true});
//
//                    }
//                });
//
//            }
//        });

        $('#modal').modal('show');
        $('.left_col').css({"z-index": -1});
        $('#frame').attr('src', $(this).attr('value'));
        $('#modalContent').css({"height": "80vh"});
        //.find('#modalContent');
        //.append($(this).attr('value'));
        //dynamiclly set the header for the modal
        //document.getElementById('modalHeader').innerHTML = '<h4>' + $(this).attr('title') + '</h4>';
        //}
        
    });

    $('#modal').on('hidden.bs.modal', function () {
        // do something…
        $('.left_col').css({"z-index": 9999});
    });


});
