<!DOCTYPE html>
<html>
<head>
    <title>Star Rating Example</title>
    <style>
        .star {
            font-size: 30px;
            color: gray;
            cursor: pointer;
        }
        .filled {
            color: orange;
        }
    </style>
</head>
<body>

<?php
$max_stars = 5;
$current_rating = 3;

for ($i = 1; $i <= $max_stars; $i++) {
    $class = $i <= $current_rating ? "filled" : "empty";
    echo "<span class='star $class' data-value='$i'>&#9733;</span>";
}
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Add click event handler to stars
    $(".star").click(function() {
        // Update the current rating value
        var value = $(this).data("value");
        $(".star").removeClass("filled");
        for (var i = 1; i <= value; i++) {
            $(".star[data-value='" + i + "']").addClass("filled");
        }
        
        // Submit the rating value to the server using AJAX
        $.post("#", {rating: value}, function(data) {
            // Handle the server's response
        });
    });
});
</script>

</body>
</html>