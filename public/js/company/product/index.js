$(document).ready(function() {
    $('.productRemove').on('click', function() {
        if(confirm('確定刪除?') == false) {
            console.log('no');
            return false;
        }
    });

    $('.create').on('click', function() {
        var productAmount = $('input[name=productAmount]').val();
        if(productAmount >= 5) {
            alert('最多5個');
            return false;
        }
    });
});
