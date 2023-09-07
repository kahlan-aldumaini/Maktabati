<?php
require_once 'init.php';
$pageTitle = lang("advance_search_title");
$activePage = "advance_search";
require_once $tmpl . 'header.php';
if (!isset($_SESSION['UserEmail'])) {
    //to allow only authorized user
    redirect_user();
}
?>

<div class="searchForm pt-3  mt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="advance_searchTitle text-center blue-text pt-4 pb-4" id="advance_title">
                <h1><?= lang('advance_search'); ?></h1>
            </div>
        </div>
        <div class="alert alert-danger text-center fw-bold fs-4" id="all_field_empty" style="display:none;"><?= lang('search_empty'); ?> </div>

        <form name="login" id="search_form" method="POST">

            <div class="row align-content-center justify-content-center">
                <div class="form-group col-lg-3 col-md-6 col-sm-6">
                    <label for="book_title" class="form-label mb-2 pe-1 mt-2"><?= lang('book_title'); ?></label>
                    <input type="text" autocomplete="off" list="book_auto_complete" class="form-control mb-3" id="book_title" name="book_title" placeholder="<?php echo lang('book_title_place') ?>" autofocus>

                    <datalist id="book_auto_complete">
                        <?php
                        $rows = get_all_data("SELECT title FROM book");
                        if ($rows != 0) {
                            foreach ($rows as $row) {
                                echo ' <option value="' . $row['title'] . '">';
                            }
                        }
                        ?>
                    </datalist>
                </div>
                <div class="col-lg-3"></div>
                <div class="form-group col-lg-3   col-md-6 col-sm-6">
                    <label for="search_author" class="form-label mb-2 pe-1 mt-2"><?= lang('author'); ?></label>
                    <input type="text" autocomplete="off" list="author_auto_complete" class="form-control  mb-3" id="search_author" name="search_author" placeholder="<?php echo lang('author_place') ?>">

                    <datalist id="author_auto_complete">
                        <?php
                        $rows = get_all_data("SELECT author_name FROM author");
                        if ($rows != 0) {
                            foreach ($rows as $row) {
                                echo ' <option style="color: red;" value="' . $row['author_name'] . '">';
                            }
                        }
                        ?>
                    </datalist>
                </div>
            </div>

            <div class="row align-content-center justify-content-center">
                <div class="form-group col-lg-3 col-md-6 col-sm-6">
                    <label for="search_publish_date" class="form-label mb-2 pe-1 mt-2"><?= lang('publish_date'); ?></label>
                    <input type="month"  autocomplete="off" class="form-control mb-3" id="search_publish_date" name="search_publish_date" placeholder="<?php echo lang('publish_date_place') ?>" autofocus>
                </div>
                <div class="col-lg-3"></div>
                <div class="form-group col-lg-3   col-md-6 col-sm-6">
                    <label for="search_language" class="form-label mb-2 pe-1 mt-2"><?= lang('language'); ?></label>
                    <input type="text" autocomplete="off" list="lang_auto_complete" class="form-control  mb-3" id="search_language" name="search_language" placeholder="<?php echo lang('language_place') ?>">

                    <datalist id="lang_auto_complete">
                        <?php
                        $rows = get_all_data("SELECT lang_name FROM language");
                        if ($rows != 0) {
                            foreach ($rows as $row) {
                                echo ' <option value="' . $row['lang_name'] . '">';
                            }
                        }
                        ?>
                    </datalist>
                </div>
            </div>

            <div class="row align-content-center justify-content-center">
                <div class="form-group col-lg-3 col-md-6 col-sm-6">
                    <label for="search_category" class="form-label mb-2 pe-1 mt-2"><?= lang('category'); ?></label>
                    <input type="text" autocomplete="off" list="categories_auto_complete" class="form-control mb-3" id="search_category" name="search_category" placeholder="<?php echo lang('category_place') ?>" autofocus>

                    <datalist id="categories_auto_complete">
                        <?php
                        $rows = get_all_data("SELECT cat_name FROM categories");
                        if ($rows != 0) {
                            foreach ($rows as $row) {
                                echo ' <option value="' . $row['cat_name'] . '">';
                            }
                        }
                        ?>
                    </datalist>
                </div>
                <div class="col-lg-3"></div>
                <div class="form-group col-lg-3   col-md-6 col-sm-6">
                    <label for="search_publisher" class="form-label mb-2 pe-1 mt-2"><?= lang('publisher'); ?></label>
                    <input type="text" autocomplete="off" list="publisher_auto_complete" class="form-control  mb-3" id="search_publisher" name="search_publisher" placeholder="<?php echo lang('publisher_place') ?>">
                    <datalist id="publisher_auto_complete">
                        <?php
                        $rows = get_all_data("SELECT pub_name FROM publisher");
                        if ($rows != 0) {
                            foreach ($rows as $row) {
                                echo ' <option value="' . $row['pub_name'] . '">';
                            }
                        }
                        ?>
                    </datalist>
                </div>
            </div>

            <div class="row align-content-center justify-content-center">
                <div class="form-group col-lg-3 col-md-6 col-sm-6">
                    <label for="search_dewyNo" class="form-label mb-2 pe-1 mt-2"><?= lang('dewyNo'); ?></label>
                    <input type="text" autocomplete="off" class="form-control mb-3" id="search_dewyNo" name="search_dewyNo" placeholder="<?php echo lang('dewy_no_place') ?>" autofocus>
                </div>
                <div class="col-lg-3"></div>
                <div class="form-group col-lg-3   col-md-6 col-sm-6">
                    <label for="search_isbn" class="form-label mb-2 pe-1 mt-2"><?= lang('isbn'); ?></label>
                    <input type="text" autocomplete="off" class="form-control  mb-3" id="search_isbn" name="search_isbn" placeholder="<?php echo lang('isbn_place') ?>">
                </div>
            </div>

            <div class="row align-content-center justify-content-center">
                <div class="form-group col-lg-3 col-md-6 col-sm-6">
                    <label for="search_series_name" class="form-label mb-2 pe-1 mt-2"><?= lang('series_name'); ?></label>
                    <input type="text" autocomplete="off" list="series_auto_complete" class="form-control mb-3" id="search_series_name" name="search_series_name" placeholder="<?php echo lang('series_name_place') ?>" autofocus>

                    <datalist id="series_auto_complete">
                        <?php
                        $rows = get_all_data("SELECT series_name FROM series");
                        if ($rows != 0) {
                            foreach ($rows as $row) {
                                echo ' <option value="' . $row['series_name'] . '">';
                            }
                        }
                        ?>
                    </datalist>
                </div>
                <div class="col-lg-3"></div>
                <div class="form-group col-lg-3   col-md-6 col-sm-6"></div>
            </div>

            <div class="row align-content-center justify-content-center mt-4 pb-5">
                <div class="form-group col-lg-2 col-md-6 col-sm-6">
                    <div class="d-grid gap-2">
                        <button onclick="searchFormCheck()" class="btn blue-btn rounded-3 mt-2 mb-2 fw-bold" id="search_submit" type="button"><i class="fa-duotone fa-magnifying-glass"></i> <?php echo lang('search') ?></button>
                    </div>
                </div>
                <div class="col-lg-4"></div>
                <div class="form-group col-lg-2   col-md-6 col-sm-6">
                    <div class="d-grid gap-2">
                        <button class="btn  rest-btn rounded-3 mt-2 mb-2 fw-bold" type="reset"><i class="fa-duotone fa-eraser"></i> <?php echo lang('rest') ?></button>
                    </div>
                </div>
            </div>

        </form>

    </div>

</div>

<?php include $tmpl . 'footer.php'; ?>