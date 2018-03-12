$('.dropify').dropify({
    messages: {
        'default': 'Drag and drop a file here or click',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Remove',
        'error':   'Ooops, something wrong happended.'
    }
});

var tag = $('#admin-content p:first:has("a")');
$('.page-titles .col-md-5.align-self-center').html(tag.html());
tag.remove();