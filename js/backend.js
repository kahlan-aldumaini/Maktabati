/* the custom jQuery code here */

// initialize var
var limit = 20;
var start = 0;
var load_status = 'inactive';
var currentFocus = -1;


//login.php  && signup.php
// for Hide and Show the password by using the EYE icons
function hidePassword(target) {
    var input = document.getElementById(target);

    if (input.type === 'password') {
        input.type = "text";
        $("#hide").addClass("fa-eye-slash").removeClass("fa-eye");
    } else {
        input.type = "password";
        $("#hide").addClass("fa-eye").removeClass("fa-eye-slash");
    }
}

//chick if check box is check
function ifCheckBox() {
    var valid = $('#valid').val();
    if (valid === "valid") {
        if ($('input[type="checkbox"]').is(':checked')) {
            $('#signup_btn').attr("disabled", false);

        } else {
            $('#signup_btn').prop('disabled', true);
        }
    } else {
        $('#signup_btn').prop('disabled', true);
    }

};

//to check if user accept rule after chick and edit in filed
function checkValid() {
    var valid = $('#valid').val();
    if (($('input[type="checkbox"]').is(':checked')) && (valid === "valid")) {
        $('#signup_btn').attr("disabled", false);
    } else {
        $('#signup_btn').prop('disabled', true);
    }
}

// signup Validation
function checkSignupData($div) {
    var email = $("#email").val().trim();
    var password = $("#password").val().trim();
    jQuery.ajax({
        url: "signup_validation.php",
        data: { email: email, password: password, div: $div },
        type: "POST",
        success: function(data) {
            $($div).html(data);
        },
        error: function() {}
    });

}

//search form 
//to check if at least one filed is not empty
function searchFormCheck() {
    var count = 0;
    //check from all input type of it is text
    $('#search_form input[type=text]').each(function() {
        if ($(this).val()) {
            count++;
            return false;
        }
    });
    if (count > 0) {
        $('#search_form').attr('action', 'search_result.php');
        $('#search_submit').attr('type', 'submit');
    } else {
        // check from the input of type date
        if ($('#search_publish_date').val()) {
            $('#search_form').attr('action', 'search_result.php');
            $('#search_submit').attr('type', 'submit');
        } else {
            window.location.href = "#advance_title";
            $('#all_field_empty').fadeIn(2500);
        }
    }
}

// to get more section from database and append it to the page
// { limit: limit, start: start, type: type , section_id: section_id}
function loadSection(url, container, options) {
    $.ajax({
        type: 'POST',
        url: url,
        data: Object.assign({ limit: limit, start: start }, options),
        cache: false,
        beforeSend: function() {
            // to show loading icon
            $('.load_more_scroll_loader').removeClass("d-none");
        },
        success: function(response) {
            // to add the response to the page
            $("#" + container).append(response);
            // to hide loading icon
            $('.load_more_scroll_loader').addClass("d-none");

            // check if there is more categories on not
            load_status = response == '' ? "active" : "inactive";

            // display message if no data
            if ((response == '') && (start == 0)) {
                errorMessage(container, options.section);
            }
        },
        error: function(response) {
            // do some thing
        }
    });
}

// display message if no data found
function errorMessage(container, param) {
    message = '<div class="container text-center" ><h1 class="mb-0 pb-0 pt-5 text-muted">';
    message += isNaN(param) ? 'لا يوجد نتائج فيما تبحث عنه !!' : 'لا يوجد كتب !!';
    message += '</h1><img src="img/No_data.svg" class="img-fluid w-75 w" /></div>';
    $("#" + container).html(message);
}

// to load more data on scroll event only if there is more category in database
function scrollLoader(url, container, option) {

    if ($(window).scrollTop() >= $(document).height() - $(window).height() && load_status == 'inactive') {
        load_status = 'active';
        start = start + limit;
        loadSection(url, container, option);
    }
}

// for delete popup param
// {"id":"$cat_id", "img":"$auth_img"}
function deletePop(url, options) {
    // get the id
    delete_id = "id=" + options['id'];

    // get the img if exist
    if (options['img']) {
        delete_img = "&img=" + options['img'];
        $("#delete_btn").attr("onclick", "window.location.href='" + url + "?" + delete_id + delete_img + "'");
    } else {
        $("#delete_btn").attr("onclick", "window.location.href='" + url + "?" + delete_id + "'");
    }
}

// to search for any thing : author , publisher and category
function search(searchText, url, options) {

    if (searchText != '') {
        $.ajax({
            type: 'POST',
            url: url,
            data: options,
            cache: false,
            beforeSend: function() {
                // to show loading icon
                // old icon : // fa-circle-notch
                $("#search_icon").addClass('fa-spinner-third fa-spin').removeClass('fa-magnifying-glass');
            },
            success: function(response) {
                // to add the response to the page
                $('#result_list').html(response);
                // to hide loading icon
                $("#search_icon").addClass('fa-magnifying-glass').removeClass('fa-spinner-third fa-spin');
                // to reset the current focus suggestion item
                currentFocus = -1;
            },
            error: function(response) {
                // handel error
            }

        });
    } else {
        $('#result_list').html('');
    }

}

// to display redirect seconds
function myTimer() {
    --second;
    $('#second').html(second);
    if (second === 0) clearInterval(redirectTime);
}

// to call function only when page loaded
$(document).ready(function() {
    // make the width of search result equal to search input
    $('#result_list').width($('.search').width());

    // hide search result
    $("#search_txt").blur(function() {
        setTimeout(function() {
            $('#result_list').hide();
        }, 200);
    });

    // show search result
    $("#search_txt").focus(function() {
        $('#result_list').show();
    });

    // for click rating star style
    $(".rate").click(function() {
        $(this).addClass("active").siblings().removeClass("active");
    });

    // to navigate search suggestion using arrow key
    $("#search_txt").keydown(function(e) {
        switch (e.key) {
            case "ArrowDown":
                Navigate(1);
                break;
            case "ArrowUp":
                Navigate(-1);
                break;
            case "Enter":
                if ($("#result_list .active").length) {
                    e.preventDefault();
                    $("#result_list .active")[0].click();
                }
                break;
            default:
                return; // exit this handler for other keys
        }
    });

    // for suggestion navigation
    var Navigate = function(diff) {
        currentFocus += diff;
        var listItems = $(".search-item");

        if (currentFocus >= listItems.length) {
            currentFocus = 0;
        }
        if (currentFocus < 0) {
            currentFocus = listItems.length - 1;
        }

        // not eq(index) start index form 0
        listItems.removeClass("active").eq(currentFocus).addClass("active");
    };
});

// ************** upload page *********************

//show alert message function
function show_alert(message, alert) {
    $('#alert_wrapper').html(
        '<div class="alert alert-' + alert + ' alert-dismissible fade show" role="alert" >' +
        '<span>' + message + '</span>' +
        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button></div>'
    );
};

// to check file extension
function validate_file(bookName) {
    // allowed book extension
    var allowExtension = ['pdf', 'doc', 'docx'];
    // to get the book extension
    var bookExtension = bookName.split('.').pop().toLowerCase();

    //to check if the chosen file is in the allowed list or not
    if (!(allowExtension.includes(bookExtension))) {
        // display error message and disable upload button and rest input
        show_alert("عذراً, غير مسموح برفع ملفات عدا :" + allowExtension.join(', '), "warning");
        $("#upload_btn").prop("disabled", true);
        $('#fileToUpload').val('');

        // to exit from the method
        return false;
    }
    // remove error message and enable submit btn
    $("#alert_wrapper").html('');
    $("#upload_btn").prop("disabled", false);
    // go to check if file exist in server
    checkBookExist(bookName);
}

//check book if exist in server before uploading
function checkBookExist(bookName) {
    $.ajax({
        type: "HEAD",
        url: "upload/pdf/" + bookName,
        error: function() {
            //file not exists
            $("#alert_wrapper").html('');
            $("#upload_btn").prop("disabled", false);
        },
        success: function() {
            //file exists
            show_alert("الكناب موجود مسبقاً..!", "danger");
            $("#upload_btn").prop("disabled", true);
            $('#fileToUpload').val('');
        }
    });
}

// to upload the book
function upload() {
    //check if book id have value and it is a number
    if (!$('#book_id').val() || !$.isNumeric($('#book_id').val())) {
        show_alert("يجب إختيار كتاب", "warning");
        return;
    }
    //check if input have value
    if (!$('#fileToUpload').val()) {
        show_alert("يجب اختيار ملف لرفعة..!", "warning");
        $('#fileToUpload').focus();
        return;
    }
    //hide alert message if it is already exist
    $('#alert_wrapper').html("");

    //to make new form data to hold data to send it
    var formData = new FormData();
    formData.append('book_id', $('#book_id').val());
    formData.append("upload", $('#fileToUpload')[0].files[0]);

    var xhr_request = $.ajax({
        type: 'POST',
        url: 'upload_book.php',
        data: formData,
        dataType: 'json',
        contentType: false,
        cache: false,
        processData: false,
        xhr: function() {
            var my_xhr = $.ajaxSettings.xhr();
            if (my_xhr) {
                my_xhr.upload.addEventListener("progress", function(event) {
                    Progress(event.loaded, event.total);
                });
            }
            return my_xhr;
        },
        beforeSend: beforeSend(),
        success: function(response) {
            reset_input();
            if (response.status == 1) {
                show_alert(response.message, "success");
                setTimeout(function() { window.history.back() }, 5000);
            } else {
                show_alert(response.message, "danger");
            }
        },
        error: function(response) {
            reset_input();
            show_alert("خطأ في رفع الملف", "danger");
            console.log(response);
        }

    });

    //cancel the upload when click btn
    $("#cancel_btn").click(
        function() {
            xhr_request.abort();
        }
    )
}

// progress bar
function Progress(current, total) {
    // get the total uploaded percentage
    var percent = ((current / total) * 100).toFixed(0) + "%";

    $("#progress_contain").removeClass("d-none");
    //to change the status of progress bar and its label
    $("#progress_load").attr("style", "width:" + percent);
    $("#progress_status").text(percent);
    if (percent == "100%") {
        $("#progress_status").text("Processing");
    }
}

//run before upload is made
function beforeSend() {
    //to disable choose file, and sponsor list:: while uploading file
    $("#fileToUpload").prop("disabled", true);
    //hide the upload btn 
    $('#upload_btn').addClass("d-none");
    //show the hidden element (loading and cancel btn ,progress bar)
    $('#loading_btn').removeClass("d-none");
    $('#cancel_btn').removeClass("d-none");
}

//to rest input after uploading
function reset_input() {
    $('#fileToUpload').val('');
    //to enable choose file
    $("#fileToUpload").prop("disabled", false);

    //hide the same btn 
    $('#cancel_btn').addClass("d-none");
    $('#loading_btn').addClass("d-none");
    $('#progress_contain').addClass("d-none");
    //show upload btn again
    $('#upload_btn').removeClass("d-none");
    $('#progress_load').attr("style", "width: 0%")
}

// for add category validation

// Disable form submissions if there are invalid fields
window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
}, false);