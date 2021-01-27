/////////// categories hover effect ///////////////
let categories = document.querySelectorAll('.category');
categories.forEach(function(category) {

    category.addEventListener('mouseover', function() {
        category.style = "cursor :pointer;"
        category.children[1].style = "display :block";
        category.children[0].style = "filter :brightness(10%); transition :2s";
    });
    category.addEventListener('mouseout', function() {
        category.children[1].style = "display :none";
        category.children[0].style = "filter :brightness(100%); transition :1s";
    });
    category.addEventListener('click', function() {
        document.getElementById('cat_name').value = category.children[1].textContent;
        document.getElementById('fetchArticlesForm').submit();
    });

});
/////////// categories hover effect ///////////////