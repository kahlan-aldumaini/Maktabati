<?php
//to redirect user 
function redirect_user($message = null, $second = 0, $url = 'login.php')
{
    if (!empty($message)) {
        echo ("
        <div class='d-flex justify-content-center align-items-center w-100 h-100 position-absolute'>
            <div class='alert alert-danger p-5'>
                <p class='fw-bold'>" . $message . "</p>
                <p class='fs-6'>" . lang('redirect_after') . "<span id='second'></span>" . lang('second') . "</p>
            </div>
        </div>
        <script>
            var second = $second;
            $('#second').html(second);
            var redirectTime = setInterval(myTimer, 1000);
        </script>
        ");
    }

    header("refresh:$second;url=$url");
    exit();
}

// to redirect user to previous page
function go_back()
{
    header("LOCATION: " . $_SERVER['HTTP_REFERER']);
    exit();
}
