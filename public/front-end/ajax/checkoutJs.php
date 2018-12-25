<!-- <script>
//Cart Updation start
$.ajaxSetup( {
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
} );

function saveToDatabase() {
    $( '#cart-id' ).submit( function( e ) {
        e.preventDefault();
        var select = $( this ).serialize();
        // POST to php script
        $.ajax( {
            type: 'POST',
            url: '<?php echo asset("/")?>productQuantityUpCart',
            data: select
        }).then( function( data ) {
            alert( data )
        } );
        return false;
    } );
}

$(document).ready(function()
{
    saveToDatabase();
});

//Cart updation end
</script> -->