<?php
function lang($phrase)
{
   static $lang = array(
      // this lang for index.php
      //global lang
      'NotAuthorize'                         => 'عذرا لايمكنك الوصول الى هذه الصفحة ',
      //lang of page title
      'book_details'                         => 'تفاصيل الكتاب',
      'advance_search_title'                 => 'بحث متقدم',
      'login_title'                          => 'تسجيل الدخول',
      'signup_title'                         => 'إتشاء حساب',

      //lang of header.php
      'Maktabati'                            => 'مكتبتي',
      'home'                                 => 'الرئيسية' ,
      'categories'                           => 'الأقسام',
      'authors'                              => 'المؤلفين',
      'publishers'                           => 'دور النشر',
      'search'                               => 'بحث',
      'login'                                => 'تسجيل الدخول',
      'logout'                               => 'تسجيل الخروج',
      'logout_Accept'                        => 'خروج',
      'logout_popup'                         => 'هل انت متاكد انك تريد الخروج ؟',
      //end of header.php

      //Start of login.php
      'email'                                => 'البريد الإلكتروني',
      'password'                             => 'كلمة المرور',
      'email_placeholder'                    => 'mohammeed@gmail.com',
      'password_placeholder'                 => 'Mohammed@123#$',
      'no_account'                           => 'ليس لديك حساب ؟  ' ,
      'new_account'                          => 'إنشاء حساب ',
      'login_error'                          => ' خطأ في البريد الإلكتروني أو كلمة المرور الرجاء المحاولة مرة اخرى',
      'login_empty'                          => 'الرجاء ملئ جميع الحقول ',
      //end of login.php

      //Start of signup.php
      'create_new_account'                   => 'إنشاء حساب جديد',
      'create_account'                       => 'إنشاء حساب',
      'username'                             => 'إسم المستخدم',
      'username_placeholder'                 => ' محمد نبيل شوابي',
      'agree'                                => 'الموافقة على',
      'condition_and_rule'                   => ' الشروط و الاحكام',
      'hav_account'                          => ' لديك حساب ؟ ',
      'signup_empty_field'                   => 'الرجاء ملئ كل الحقول المطلوبة والموافقة على الشروط والاحكام',
      'signup_success'                       => 'تم إنشاء حسابك بنجاح قم بتسجيل الدخول',
      'error_email_exist'                    => 'عذرا !! هذا البريد الإلكتروني موجود مسبقا',
      'error_email_invalid'                  => ' عذرا  !! البريد الإلكتروني غبر صحيح ' ,
      'success_email_valid'                  => 'هذا البريد الإلكتروني صحيح ',
      'error_invalid_pass'                   => 'كلمة المرور ضعيفة ',
      'success_valid_pass'                   => 'كلمة مرور قوية',
      //End  of signup.php
      //Start  of advance_search.php
      'advance_search'                       => 'بحث متقدم عن الكتب',
      'book_title'                           => 'عنوان الكتاب',
      'publish_date'                         => 'تاريخ النشر',
      'author'                               => 'المؤلف',
      'language'                             => 'اللغة',
      'publisher'                            => 'دار النشر',
      'isbn'                                 => 'الترقيم الدولي',
      'category'                             => 'القسم ',
      'series_name'                          => 'اسم السلسة',
      'dewyNo'                               => 'التصنيف الديوي',
      
      'advance_search_place'                 => 'بحث متقدم عن الكتب',
      'book_title_place'                     => 'كتاب الرحيق المختوم',
      'publish_date_place'                   =>  '2007-09',
      'author_place'                         => ' صفي الرحمن المباركفوري',
      'language_place'                       => 'العربية',
      'publisher_place'                      => 'دار المعرفة',
      'isbn_place'                           => '769-867-9865-85-3',
      'category_place'                       => 'السيرة النبوية',
      'series_name_place'                    => 'عالم المعرفة',
      'dewy_no_place'                        => '225',
      'rest'                                 => 'إعادة تعين',
      'search_empty'                         => ' للبحث يجب ملئ حقل واحد على الاقل',
      //End  of advance_search.php

      //Start  of book_details.php
      'pages'                                => ' الصفحات',
      'size'                                 => ' الحجم',
      'file_type'                            => ' نوع الملف ',
      'no_of_copy'                           => ' عدد النسخ',
      'book_description'                     => ' وصف الكتاب ',
      'download'                             => ' تحميل ',
      'open'                                 => ' تصفح ',
      'rating'                               => ' تقيم ',
      'upload'                               => ' رفع ',
      'borrows'                              => ' إعارة ',
      'No_ID'                                => ' عفوا لايوجد كتاب يحمل هذا الرقم',
      'add'                                  =>'إضافة',
      'cancel'                               =>'إلغاء',
      'rating_popup'                         => 'قم بتقيم الكتاب',
      //End  of book_details.php
      
      // start of sticky button template
      'add_category'                         => 'إضافة قسم',
      'add_publisher'                        => 'إضافة دار نشر',
      'add_publisher'                        => 'إضافة كتاب',
      'add_author'                           => 'إضافة مؤلف',

      //start of book template
      'edit_book'                            => 'تعديل الكتاب',
      'delete_book'                          => 'حذف الكتاب',
      'no_book'                              => 'لا يوجد اي كتب لعرضها...',

      //start of category template
      'edit_cat'                             => 'تعديل القسم',
      'delete_cat'                           => 'حذف القسم',
      'edit_pub'                             => 'تعديل دار النشر',
      'delete_pub'                           => 'حذف دار النشر',

      //start of author template
      'edit_auth'                            => 'تعديل المؤلف',
      'delete_auth'                          => 'حذف المؤلف',
      'book'                                 => 'كتاب',

      // start of feature template
      'feature_one_title'                    => '4,000 عملية بحث يومياً',
      'feature_one_subtitle'                 => 'أكثر من 4 ألف عملية بحث عن كتاب عربي تحدث يومياً على مكتبتي',
      'feature_two_title'                    => '9,835 كتاب',
      'feature_two_subtitle'                 => 'آلاف الكتب المنشورة على مكتبتي منها ما نشره المؤلف بنفسه أو فريق المكتبة',
      'feature_three_title'                  => '2,204 مؤلف',
      'feature_three_subtitle'               => 'تهدف مكتبتي إلى إنشاء أكبر قاعدة بيانات لمؤلفين الكتب العربية',
      'feature_four_title'                   => '6,000 زائر شهرياً',
      'feature_four_subtitle'                => 'يزور موقع مكتبتي اكثر من 6 ألف زائر مهتم بالكتب العربية شهرياً حول العالم',

      //start of search template
      'search_category'                      => 'ابحث عن قسم',
      'search_author'                        => 'ابحث عن مؤلف',
      'search_publisher'                     => 'ابحث عن دار نشر',
      'search_home'                          => 'ابحث عن كتاب أو مؤلف أو قسم كتاب أو دار نشر',
      'search_btn'                           => 'بحث',
      'no_result'                            => 'لا توجد نتائج',
      
      // start of index
      'home_title'                           => 'مكتبتي.... عالم من المعرفة بين يديك' ,

      // start of page title template
      'category_title'                       => 'أقسام الكتب' ,
      'publisher_title'                      => 'دور النشر' ,
      'author_title'                         => 'مؤلفو الكتب' ,

      // start of popup template
      'delete'                               => 'حذف' ,
      'close'                                => 'إغلاق' ,
      'no_delete'                            => 'عذراً!!',
      
      // book delete message
      'delete_book_popup_text'               => 'هل انت متأكد من حذف الكتاب' ,
      'no_delete_book_popup_text'            => 'عذرا ، لا يمكن حذف هذا الكتاب لأنه مُعار حاليا.' ,
      // publisher delete message
      'delete_publisher_popup_text'          => 'هل انت متأكد من حذف دار النشر' ,
      'no_delete_publisher_popup_text'       => 'عذرا ، لا يمكن حذف دار النشر هذه لأنها تحتوي على بعض الكتب.' ,
      // category delete message
      'delete_category_popup_text'           => 'هل انت متأكد من حذف القسم' ,
      'no_delete_category_popup_text'        => 'عذرا ، لا يمكن حذف هذا القسم لأنه يحتوي على بعض الكتب.' ,
      // author delete message
      'delete_author_popup_text'             => 'هل انت متأكد من حذف المؤلف' ,
      'no_delete_author_popup_text'          => 'عذرا ، لا يمكن حذف هذا المؤلف لأنه لديه بعض الكتب المتعلقه.' ,

      // for search resulat page
      'no_result'                            => 'لا يوجد أي كتاب بهذا العنوان. الرجاء التأكد من صحة العنوان.' ,
      'no_result_advance'                    => 'لا يوجد نتائج فيما تبحث عنه !!' ,
      'result_title'                         => 'نتيجة البحث :' ,
      'result_breadcrumb_title'              => 'نتائج البحث' ,

      // for publisher details
      'was_established'                      => 'تأسست ' ,
      'in_date'                              => ' في تاريخ ' ,
      'by'                                   => ' من قبل ' ,
      'sequential_deposit_no'                => ' وتحمل الرقم المتسلسل ' ,
      
      // for redirect message
      'redirect_after' => ' سيتم تحويلك بعد ',
      'second' => ' ثواني ...',
      'redirect_search_message'              => 'يجب عليك البحث عن كتاب للوصول الى هذه الصفحة',
      'redirect_pub_message'                 => 'يجب إختيار دار نشر للوصول الى هذه الصفحة',
      'redirect_cat_message'                 => 'يجب إختيار قسم للوصول الى هذه الصفحة',
      'redirect_auth_message'                => 'يجب إختيار مؤلف للوصول الى هذه الصفحة',

      // for upload book page
      'no_session'                           => 'يجب عليك تسجيل الدخول اولاً',
      'no_data'                              => 'يجب اختيار ملف لرفعة..!',
      'file_exists'                          => 'الكناب موجود مسبقاً..!',
      'not_allowed'                          => 'عذراً, غير مسموح برفع ملفات عدا :',
      // Sorry, there was an error uploading your file.
      'error_uploading'                      => 'عذراً, فشل رفع الملف الرجاء المحاوله لاحقاً',
      'error_insert'                         => 'عذراً, فشل إضافة الملف',
      'book_inserted'                        => 'تم رفع الكتاب بنجاح 😀',

      //start  of upload.php
      'upload_file'                          => ' رفع ملف الى السرفر',
      'select_file'                          =>' إختار الملف  لرفعه الى السرفر',
      'file_not_exist'                       => '!! عذرا الملف غير موجود ',
      'load_btn'                             => 'تحميل',
      'cancel_btn'                           => 'إلغاء',
      //End  of upload.php

      //start add category
      'category_name'                        => 'إسم القسم',
      'category_placeholder'                 => 'التاريخ والحضارة',
      'fill_category_error'                  => 'الرجاء ملئ هذا الحقل.',
      'fill_category_valid'                  => 'صحيح.',



   );
   
   return  $lang[$phrase];
}
