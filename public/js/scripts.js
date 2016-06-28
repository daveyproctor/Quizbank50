/**
 * Handles typeahead
 */
function tags(){
    var start = $('#query1').val();
    console.log("tags function starts");
    if (start == null)
    {
        start = "";
    }
    var url = 'tags.php?start=' + start;
    console.log(url);
    $.getJSON(url, function(data) {
            console.log( "success" );
        })
        .done(function(data) {
            console.log( "second success" );
            options = "";
            for (var tagkey in data)
            {
                option = "<option value=" + data[tagkey]["tag"] + ">";
                options = options.concat(option);
            }
            $('#tag_list').html(options);
            console.log("changed tag_list data");
        })
        .fail(function(error) {
            console.log("we erred here2");
            console.log( error );
        })
        .always(function(data) {
            console.log( "complete" );
            console.log("data: ");
            console.log(data);
        });
}
//when doc is ready...
$(function(){
        //do this
        console.log('hello');
        tags();
});

$('#query1').keypress(function() {
    console.log("query id was touched");
    tags();
});

//$(function())

/**
 * Gets a quote via JSON.
 */
function question()
{
    console.log("Started");
    var url = 'question.php'; //+ $('#query').val();
    $.getJSON(url, function(data) {
        console.log( "success" );
        })
        .done(function(data) {
        console.log( "second success" );
        $('#question').html(data["key"]);
        })
        .fail(function(error) {
        console.log("we erred here");
        console.log( error );
        })
        .always(function(data) {
        console.log( "complete" );
        console.log("data: ");
        console.log(data);
        });
        //console.log("here");
        //$('#question').html(data[0]);
}