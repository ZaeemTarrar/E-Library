@echo off

:initials
    REM Console Settings
        mode 1000
    REM Console Settings
    REM Welome Voice
        
    REM Welcome Voice
    REM welcome guide Voice
        
    REM Welcome guide Voice


REM The Main Project Body
:main_project
    call :speak "welcome.vbs"
    call :speak "welcome_guide.vbs"
    cls
    timeout 1
    cls
    :main_menu_section
        call :main_menu

        echo.
        echo Enter the Option:
        echo.
        set /p enter_option=
        echo.

        if %enter_option% == 1 goto case_migration_bug
        if %enter_option% == 2 goto case_initial_migrations_models
        if %enter_option% == 3 goto case_initial_seeds
        if %enter_option% == 4 goto case_public_storage
        if %enter_option% == 5 goto case_user_authentication
        if %enter_option% == 6 goto case_initial_controllers
        if %enter_option% == 7 goto case_ace_layout
        if %enter_option% == 8 goto case_setting_env
        if %enter_option% == 9 goto case_custom_migrations_models
        if %enter_option% == 10 goto case_custom_controllers
        if %enter_option% == 11 goto case_custom_views
        if %enter_option% == 12 goto case_custom_seeds
        if %enter_option% == 13 goto case_project_routes
        if %enter_option% == 14 goto case_database_migration
        if %enter_option% == 15 goto case_database_seeding
        if %enter_option% == 16 goto case_template_breaking
        if %enter_option% == 17 goto case_list_views
        if %enter_option% == 18 goto case_list_routes
        if %enter_option% == 19 goto case_list_controllers
        if %enter_option% == 20 goto case_list_models
        if %enter_option% == 21 goto case_list_migrations
        if %enter_option% == 22 goto case_list_seeds
        if %enter_option% == 23 goto case_project_refresh
        if %enter_option% == 24 goto case_installing_library
        if %enter_option% == 25 goto case_exit
        goto invalid_section

        :case_migration_bug
            cls
            echo.
            call :speak "bug_removed.vbs"
            echo Activating Bug Fixer ...
            echo.
            php zaeem/setup.php zaeem/AppServiceProvider app/Providers/
            goto go_back_section
        :case_initial_migrations_models
            cls
            echo.
            call :speak "initial_migration.vbs"
            echo Installing the Initial Migration and Models ...
            echo.
            php artisan make:migration create_roles_table
            echo.
            php artisan make:migration create_notificationtypes_table
            echo.
            php artisan make:migration create_notifications_table
            echo.
            php artisan make:model Role
            echo.
            php artisan make:model Notificationtype
            echo.
            php artisan make:model Notification
            echo.
            php zaeem/m.php role s:name i:access*uns,d=0 x:user@hm
            echo.
            php zaeem/m.php user:a s:name s:email*u s:password r i:role@b*uns,d=0 x:notification@hm
            echo.
            php zaeem/m.php notificationtype s:name x:notification@hm
            echo.
            php zaeem/m.php notification s:message b:status*d=0 i:user@b*uns,d=0 i:notificationtype@b*uns,d=0
            goto go_back_section
        :case_initial_seeds
            cls
            echo.
            call :speak "initial_seeds.vbs"
            echo Installing the Seeds of the Initial Models
            echo.
            php artisan make:seeder UserTableSeeder
            echo.
            php zaeem/s.php User name=s=zaeem:password=p=123456:email=s=zaeemtarrar3@gmail.com:role_id=i=1
            echo.
            php artisan make:seeder RoleTableSeeder
            echo.
            SET qu=php zaeem/s.php Role

            call :speak "initial_roles.vbs"
            :role_loop
                CLS
                ECHO.
                call :speak "forget_roles.vbs"
                ECHO Enter the Role Name: 
                SET /p role_name=
                ECHO.
                ECHO Enter the Access of the Role ( In Integer ):
                SET /p role_access=
                ECHO.
                TIMEOUT 1
                ECHO.
                SET qu=%qu% name=s=%role_name%:access=i=%role_access% 
                ECHO %qu%
                CLS
                echo.
                call :speak "question_roles.vbs"
                ECHO DO You Want to Add More Role Seed ? ( Y / N )
                echo.
                SET /p role=
                IF %role% == Y GOTO role_loop
                IF %role% == N %qu%
                ECHO.
            
            cls
            echo.
            php artisan make:seeder NotificationtypeTableSeeder
            echo.
            php zaeem/s.php Notificationtype name=s=default name=s=success name=s=error name=s=upgrade name=s=info
            echo.

            goto go_back_section
        :case_public_storage
            cls
            echo.
            call :speak "public_storage.vbs"
            Activating the Public Storage Installer ...
            echo.
            php artisan storage:link
            echo.
            goto go_back_section
        :case_user_authentication
            cls
            echo.
            echo Activating the User Authentication ...
            echo.
            php artisan make:auth
            call :speak "user_auth.vbs"
            goto go_back_section
        :case_initial_controllers
            cls
            echo.
            call :speak "initial_controllers.vbs"
            echo Installing Initial Auth and Basic Controllers ...
            echo.
            php zaeem/setup.php zaeem/Controllers2 app/Http/
            php zaeem/cf.php reset
            echo.
            goto go_back_section
        :case_ace_layout
            cls
            echo.
            call :speak "ace_view.vbs"
            echo Installing the Ace Layout and Structure ...
            echo.
            php zaeem/setup.php zaeem/view2 resources/views/
            php zaeem/setup.php zaeem/assets public/
            call :speak "ace_view_finish.vbs"
            goto go_back_section
        :case_setting_env
            cls
            echo.
            call :speak "env_input.vbs"
            echo Activating the ENV Configerer ...
            echo.
            echo Enter the Name of the Database ...
            echo.
            set /p aaa=
            echo.
            php zaeem/e.php %aaa%
            call :speak "env_finish.vbs"
            goto go_back_section
        :case_custom_migrations_models
            cls 
            echo.
            REM Custom Migrations and Model
            REM php artisan make:migration create_roles_table
            REM php artisan make:model Role
            REM php zaeem/m.php role s:heading i:price*uns,d=0 b:status x:user@hm x:abc@b*uns,d=0

            :custom_model_section
                REM Custom Model Section

                :start_mod_mig
                    call :speak "m_start.vbs"
                    SET mod_query=php artisan make:model
                    SET mig_query=php artisan make:migration create_
                    SET override_query=php zaeem/m.php
                    REM Start Creating Models and Migration
                    CLS 
                    ECHO.
                    ECHO Write the Name of the Model ( Singular )
                    ECHO.
                    SET /p mod_name=
                    ECHO.
                    ECHO Now Type it in Plural for the Sake of Migration
                    ECHO.
                    SET /p mig_name=
                    ECHO.
                    
                    REM FOR /L %%A IN (1,1,200) DO (
                    REM     ECHO %%A - %mod_name[%%A]%
                    REM )
                    setlocal ENABLEDELAYEDEXPANSION
                    SET pos=0
                    SET new_mod_name=
                    :NextChar
                        SET tmp=!mod_name:~%pos%,1!
                        IF NOT %pos% == 0 GOTO skipped_alpha
                        IF %tmp% == a SET new_mod_name=%new_mod_name%A
                        IF %tmp% == b SET new_mod_name=%new_mod_name%B
                        IF %tmp% == c SET new_mod_name=%new_mod_name%C
                        IF %tmp% == d SET new_mod_name=%new_mod_name%D
                        IF %tmp% == e SET new_mod_name=%new_mod_name%E
                        IF %tmp% == f SET new_mod_name=%new_mod_name%F
                        IF %tmp% == g SET new_mod_name=%new_mod_name%G
                        IF %tmp% == h SET new_mod_name=%new_mod_name%H
                        IF %tmp% == i SET new_mod_name=%new_mod_name%I
                        IF %tmp% == j SET new_mod_name=%new_mod_name%J
                        IF %tmp% == k SET new_mod_name=%new_mod_name%K
                        IF %tmp% == l SET new_mod_name=%new_mod_name%L
                        IF %tmp% == m SET new_mod_name=%new_mod_name%M
                        IF %tmp% == n SET new_mod_name=%new_mod_name%N
                        IF %tmp% == o SET new_mod_name=%new_mod_name%O
                        IF %tmp% == p SET new_mod_name=%new_mod_name%P
                        IF %tmp% == q SET new_mod_name=%new_mod_name%Q
                        IF %tmp% == r SET new_mod_name=%new_mod_name%R
                        IF %tmp% == s SET new_mod_name=%new_mod_name%S
                        IF %tmp% == t SET new_mod_name=%new_mod_name%T
                        IF %tmp% == u SET new_mod_name=%new_mod_name%U
                        IF %tmp% == v SET new_mod_name=%new_mod_name%V
                        IF %tmp% == w SET new_mod_name=%new_mod_name%W
                        IF %tmp% == x SET new_mod_name=%new_mod_name%X
                        IF %tmp% == y SET new_mod_name=%new_mod_name%Y
                        IF %tmp% == z SET new_mod_name=%new_mod_name%Z
                        GOTO alpha_jumper

                        :skipped_alpha
                            SET new_mod_name=%new_mod_name%%tmp%
                            
                        :alpha_jumper
                        REM IF NOT %tmp% == r SET new_mod_name=%new_mod_name%!mod_name:~%pos%,1!
                        SET /a pos=pos+1
                        if "!mod_name:~%pos%,1!" NEQ "" goto NextChar
                        ECHO.
                    SET mod_query=%mod_query% %new_mod_name%
                    SET mig_query=%mig_query%%mig_name%_table
                    SET override_query=%override_query% %mod_name%
                    ECHO.
                    ECHO %mod_query%
                    ECHO %mig_query%
                    ECHO %override_query%
                    ECHO. 
                    TIMEOUT 1
                    ECHO.
                    ECHO Press a If you are creating the User Model / Migration and Wish to Authenticate
                    ECHO Press m If you only Wish to create Migration ( as in Many to Many )
                    ECHO Press _ If Answer in None from Above and If You Wish to Pass This Step
                    ECHO.
                    SET /p extra_m=
                    ECHO.
                    IF %extra_m% == a SET override_query=%override_query%:a
                    IF %extra_m% == m SET override_query=%override_query%:m

                    CLS 
                    ECHO.
                    call :speak "m_info.vbs"
                    ECHO Initializing the Field and Relation Building System 
                    ECHO.

                    :field_loop
                        REM Create the Migration and Model Fields 
                        CLS 
                        ECHO.
                        ECHO What the the Data Type of the Field ?
                        ECHO Press s for String
                        ECHO Press i for Integer ( Also User If You Plan to a Foriegn Key for BelongsTo Relation )
                        ECHO Press b for Boolean
                        ECHO Press d for Date
                        ECHO Press x .. If You Do not have a Field But Just a Relation to Add
                        ECHO Press r .. If You Wana Add Remember Token Field Only Required in Users Migration
                        ECHO.
                        SET /p mtype=
                        ECHO.
                        IF %mtype% == x ECHO Enter the Model Name You Plan to Make the Relation With ...
                        IF %mtype% == s ECHO Enter the Name of the Field ...
                        IF %mtype% == i ECHO Enter the Name of the Field ...
                        IF %mtype% == b ECHO Enter the Name of the Field ...
                        IF %mtype% == d ECHO Enter the Name of the Field ...
                        IF %mtype% == r SET override_query=%override_query% r | GOTO field_loop

                        ECHO.
                        SET /p field_name=
                        ECHO.
                        ECHO Note: Leave a ( _ ) UnderScore in case "if" there is no Relation
                        ECHO In Case if you have Placed a Model Name Instead of the Field In Previous Step ...
                        ECHO Does that Particular Model Have a Relation , with This Model ? If So ...
                        ECHO.
                        ECHO Press b for belongsTo Relation
                        ECHO Press ho For hasOne Relation
                        ECHO Press hm Form hasMany Relation
                        ECHO Press bm for belongsToMany Relation
                        ECHO.
                        SET /p rela=
                        ECHO.
                        IF %rela% == _ SET override_query=%override_query% %mtype%:%field_name%
                        IF NOT %rela% == _ SET override_query=%override_query% %mtype%:%field_name%@%rela%
                        
                        SET comma=*
                        SET counter=0
                        SET myfield=
                        SET tmp_field=
                        :field_facts
                            REM Field Facts
                            CLS
                            ECHO.
                            SET tmp_field=,
                            ECHO Note: Leave a ( _ ) UnderScore in Case "if" you want No Extra Property
                            ECHO You can only leave one Answer at a Time. 
                            ECHO What Extra Properties Do you Wish to Have in This Particular Field ?
                            ECHO Press d for Default
                            ECHO Press uns for Un Signed
                            ECHO Press u for Unique
                            ECHO Press n for Nullable
                            ECHO.
                            SET /p tmp_f=
                            ECHO.
                            IF %tmp_f% == d GOTO found_d
                            IF NOT %tmp_f% == d GOTO not_found_d

                            :found_d
                                ECHO.
                                ECHO Write down the Default Value for the Field Also ...
                                ECHO.
                                SET /p tmp_val=
                                SET tmp_field=%tmp_f%=%tmp_val%
                                GOTO after_found_d

                            :not_found_d
                                SET tmp_field=%tmp_f%

                            :after_found_d
                                IF %tmp_f% == _ GOTO mod_question
                                IF NOT %tmp_f% == _ GOTO add_mig_mod_field

                            :add_mig_mod_field
                                REM field Section
                                IF NOT %counter% == 0 SET myfield=%myfield%,
                                IF %counter% == 0  SET myfield=%myfield%*
                                SET /a counter=counter+1
                                SET myfield=%myfield%%tmp_field%
                                ECHO.
                                TIMEOUT 1
                                ECHO.
                                :mod_question
                                CLS
                                ECHO.
                                ECHO Do You Wish to Add More Details ? ( Y / N )
                                ECHO.
                                SET /p details=
                                ECHO.
                                IF %details% == Y GOTO field_facts
                                IF %details% == N GOTO end_mod_mig 
                                REM field Section
                            REM Field Facts

                            :end_mod_mig
                            SET override_query=%override_query%%myfield%
                            :mod_question
                                CLS
                                ECHO.
                                ECHO Do You Wish to Add More Fields ? ( Y / N )
                                ECHO.
                                SET /p details=
                                ECHO.
                                IF %details% == Y GOTO mod_proceed
                                IF %details% == N GOTO end_end_mod
                                :mod_proceed
                                    SET myfield=
                                    GOTO field_loop
                            :end_end_mod
                            ECHO.
                            %mig_query%
                            ECHO.
                            ECHO.
                            %mod_query%
                            ECHO.
                            ECHO.
                            %override_query%
                            call :speak "m_end.vbs"
                            ECHO.
                            TIMEOUT 3
                            REM Create the Migration and Model Fields 
                    REM Start Creating Models and Migration
        REM Custom Migrations and Model
            goto go_back_section
        :case_custom_controllers
            REM Custom Controllers
                :start_controller
                call :speak "c_start.vbs"
                SET query=php zaeem/c.php
                REM Start Controller
                CLS 
                ECHO.
                ECHO Please Enter the Name of the Controller ...
                ECHO.
                SET /p con_name=
                ECHO.
                call :speak "c_info.vbs"
                ECHO Do You Want to Secure the Controller Giving it the Access Number of A Specific Logger ? ( Y / N )
                ECHO.
                SET /p secure=
                ECHO.
                IF %secure% == Y GOTO secure_section
                IF %secure% == N GOTO not_secure_section

                :secure_section
                    SET query=%query% %con_name%@secure@
                    
                    GOTO add_security

                :not_secure_section
                    SET query=%query% %con_name%
                    
                    GOTO controller_properties

                REM Start Controller

                :add_security
                    CLS 
                    ECHO.
                    ECHO Give the Access Number of the Role for the Index Page .. as an Integer ...
                    ECHO.
                    SET /p access_index=
                    ECHO.
                    ECHO Give the Access Number of the Role for the Add/Create Page .. as an Integer ...
                    ECHO.
                    SET /p access_add=
                    ECHO.
                    ECHO Give the Access Number of the Role for the Edit/Update Page .. as an Integer ...
                    ECHO.
                    SET /p access_edit=
                    ECHO.
                    SET query=%query%index+%access_index%:add+%access_add%:edit+%access_edit%
                    ECHO %query%

                :controller_properties
                    call :speak "c_info2.vbs"
                    CLS 
                    :controller_settings
                        REM Set Controller Properties
                        CLS
                        ECHO.
                        ECHO Note: Leave a UnderScore If You Wish to Leave No Answer. Thank you
                        ECHO.
                        ECHO Write the Name of the Property ...
                        ECHO.
                        SET /p prop=
                        ECHO.
                        ECHO Write the Validation Or Validations( Seperated with "-" )( No Extra Spaces )
                        ECHO.
                        SET /p vld=
                        ECHO.
                        ECHO Is This Property Expecting the Id of the Logger ( Y / N )
                        ECHO.
                        SET /p log=
                        ECHO. 
                        ECHO Is This an Image ? ( Y / N )
                        ECHO.
                        SET /p img=
                        ECHO.
                        IF %vld% == _ GOTO no_validation
                        IF NOT %vld% == _ GOTO validation

                        :no_validation
                            SET query=%query% %prop%
                            IF %log% == Y GOTO logger1
                            IF %img% == Y GOTO imager1
                            GOTO end_controller

                            :logger1
                                SET query=%query%**logger
                                GOTO end_controller
                            :imager1
                                SET query=%query%**image
                                GOTO end_controller

                        :validation
                            SET query=%query% %prop%*%vld%
                            IF %log% == Y GOTO logger2
                            IF %img% == Y GOTO imager2
                            GOTO end_controller

                            :logger2
                                SET query=%query%*logger
                                GOTO end_controller
                            :imager2
                                SET query=%query%*image
                                GOTO end_controller

                        :end_controller
                            CLS
                            ECHO.
                            ECHO Do you Want to Add More Properties ? ( Y / N )
                            ECHO.
                            SET /p looper=
                            ECHO.
                            IF %looper% == Y GOTO controller_settings
                            IF %looper% == N %query%
                            call :speak "c_end.vbs"
                        REM Set Controller Properties
        REM Custom Controllers
            goto go_back_section
        :case_custom_views
            cls
            echo.
            REM Custom Views
                REM Custom View Index
                    :start_index_view
                        REM Start Creating Index View
                        CLS
                        ECHO.
                        ECHO Activate the Index View Builder ? ( Y / N )
                        ECHO.
                        SET /p index_go=
                        ECHO.
                        IF %index_go% == N GOTO start_add_view
                        SET index_query=php zaeem/v.php /dashboard/
                        CLS
                        ECHO.
                        ECHO Name of The Crud for Which Page is Being Constructed ...
                        ECHO.
                        SET /p page_name=
                        ECHO.
                        ECHO Do You Agree on Attaching the Add/Create Button on the Page ? ( true / false )
                        ECHO.
                        SET /p add_opt=
                        ECHO.
                        ECHO Do You Agree on Attaching the Edit/Update Button on the Page ? ( true / false )
                        ECHO.
                        SET /p edit_opt=
                        ECHO.
                        ECHO Do You Agree on Attaching the Delete/Remove Button on the Page ? ( true / false )
                        ECHO.
                        SET /p del_opt=
                        ECHO.
                        SET index_query=%index_query% %page_name%/index table:%page_name%:%add_opt%:%edit_opt%:%del_opt%
                        ECHO.
                        ECHO %index_query%
                        
                        :table_fields
                            REM Tabe fields Settings
                            CLS
                            ECHO.
                            ECHO Enter the Name , By Which You Want to Display the Field in the Table ...
                            ECHO.
                            SET /p name1=
                            ECHO.
                            ECHO Enter the Name of the field in the Model ...
                            ECHO.
                            SET /p name2=
                            ECHO.
                            ECHO Is This An Image ? ( Y / N )
                            ECHO.
                            SET /p imager=
                            ECHO.
                            IF %imager% == Y SET index_query=%index_query% %name1%@%name2%@img
                            IF %imager% == N SET index_query=%index_query% %name1%@%name2%
                            ECHO.
                            CLS
                            ECHO.
                            ECHO Do you wish to add More Fields in the Table ? ( Y / N )
                            ECHO.
                            SET /p index_again=
                            IF %index_again% == Y GOTO table_fields
                            IF %index_again% == N GOTO table_end

                            :table_end
                                REM Table end
                                %index_query%
                                ECHO.
                                TIMEOUT 3
                                ECHO.
                                REM Table end

                            REM Tabe fields Settings

                        REM Start Creating Index View
                REM Custom View Index
                REM Custom View Add
                    REM php zaeem/v.php /dashboard/ post/index table:post:true:true:true Id@id Name@name Snap@snap@img
                    REM php zaeem/v.php /dashboard/ post/index form:post:create Name:name:text:Name 

                    :start_add_view
                        REM Start Creating Add View
                        CLS
                        ECHO.
                        ECHO Activate the Create View Builder ? ( Y / N )
                        ECHO.
                        SET /p add_go=
                        ECHO.
                        IF %add_go% == N GOTO start_edit_view
                        SET add_query=php zaeem/v.php /dashboard/
                        CLS
                        ECHO.
                        ECHO Name of The Crud for Which Page is Being Constructed ...
                        ECHO.
                        SET /p page_name=
                        ECHO.
                        ECHO Enter the Text for the Form Button ...
                        ECHO.
                        SET /p button_text=
                        ECHO.
                        SET add_query=%add_query% %page_name%/add form:%page_name%:%button_text%
                        ECHO.
                        ECHO %add_query%
                        
                        :form_fields
                            REM Tabe fields Settings
                            SET name1=
                            SET name2=
                            SET name3=
                            SET name4=
                            SET name5=
                            SET name6=
                            CLS
                            ECHO.
                            ECHO Enter the Name , By Which You Want to Display the Label in the Form ...
                            ECHO.
                            SET /p name1=
                            ECHO.
                            ECHO Enter the Name of the Input bar from the Model ...
                            ECHO.
                            SET /p name2=
                            ECHO.
                            ECHO Enter the Type of the Input Field ? [ text, number, date, select, file, etc ]
                            ECHO.
                            SET /p name3=
                            ECHO.
                            ECHO Enter the Placeholder for the Input Bar ...
                            Echo Or ... Enter the Name of the List You want to display, of the Model in Select/Checkbox/Radio
                            ECHO.
                            SET /p name4=
                            ECHO.
                            
                            IF %name3% == select GOTO none_part

                            IF %name3% == checkbox GOTO none_part
                            

                            IF %name3% == radio GOTO none_part
                            

                            IF NOT %name3% == select GOTO no_none_part
                            IF NOT %name3% == checkbox GOTO no_none_part
                            IF NOT %name3% == radio GOTO no_none_part

                            :none_part
                                ECHO.
                                ECHO Enter the Name of the Property of the List you want to display in the Select/Checkbox/Radio ... 
                                ECHO.
                                SET /p name5=
                                ECHO.
                                ECHO.
                                ECHO Enter none if you want to add an Exta option of None in Select/Checkbox/Radio ...
                                ECHO.
                                SET /p name6=
                                ECHO.

                            :no_none_part

                            ECHO.

                            IF NOT %name3% == select if NOT %name3% == checkbox if not %name3% == radio GOTO out_of_none_section
                            IF %name6% == none GOTO none_section  
                            TIMEOUT 1
                            IF NOT %name6% == none GOTO no_none_section 

                            :none_section
                                SET add_query=%add_query% %name1%:%name2%:%name3%:%name4%:%name5%:none
                                GOTO out_all
                            :no_none_section
                                SET add_query=%add_query% %name1%:%name2%:%name3%:%name4%:%name5%
                                GOTO out_all
                            :out_of_none_section
                                SET add_query=%add_query% %name1%:%name2%:%name3%:%name4%

                            :out_all
                            TIMEOUT 1

                            ECHO.
                            
                            CLS
                            ECHO.
                            ECHO Do you wish to add More Fields in the Form ? ( Y / N )
                            ECHO.
                            SET /p add_again=
                            IF %add_again% == Y GOTO form_fields
                            IF %add_again% == N GOTO form_end

                            :form_end
                                REM Table end
                                ECHO.
                                ECHO %add_query%
                                ECHO.
                                TIMEOUT 1
                                %add_query%
                                ECHO.
                                TIMEOUT 3
                                ECHO.
                                REM Table end

                            REM Tabe fields Settings

                        REM Start Creating Add View
                REM Custom View Add
                REM Custom View Edit
                    REM php zaeem/v.php /dashboard/ post/index table:post:true:true:true Id@id Name@name Snap@snap@img
                    REM php zaeem/v.php /dashboard/ post/index form:post:create Name:name:text:Name 

                    :start_edit_view
                        REM Start Creating Edit View
                        CLS
                        ECHO.
                        ECHO Activate the Update View Builder ? ( Y / N )
                        ECHO.
                        SET /p edit_go=
                        ECHO.
                        IF %edit_go% == N GOTO view_end_part
                        SET edit_query=php zaeem/v.php /dashboard/
                        CLS
                        ECHO.
                        ECHO Name of The Crud for Which Page is Being Constructed ...
                        ECHO.
                        SET /p page_name1=
                        ECHO.
                        ECHO Enter the Text for the Form Button ...
                        ECHO.
                        SET /p button_text1=
                        ECHO.
                        SET edit_query=%edit_query% %page_name1%/edit form:%page_name1%:%button_text1%:edit
                        ECHO.
                        ECHO %edit_query%
                        
                        :edit_form_fields
                            REM Tabe fields Settings
                            SET name11=
                            SET name22=
                            SET name33=
                            SET name44=
                            SET name55=
                            SET name66=
                            CLS
                            ECHO.
                            ECHO Enter the Name , By Which You Want to Display the Label in the Form ...
                            ECHO.
                            SET /p name11=
                            ECHO.
                            ECHO Enter the Name of the Input bar from the Model ...
                            ECHO.
                            SET /p name22=
                            ECHO.
                            ECHO Enter the Type of the Input Field ? [ text, number, date, select, file, etc ]
                            ECHO.
                            SET /p name33=
                            ECHO.
                            IF NOT %name33% == select ECHO Enter the Placeholder for the Input Bar ...
                            IF %name33% == select ECHO Enter the Name of the List You want to display, of the Model in Select
                            ECHO.
                            SET /p name44=
                            ECHO.
                            
                            IF %name33% == select GOTO none_part1
                            IF NOT %name33% == select GOTO no_none_part1

                            :none_part1
                                ECHO.
                                ECHO Enter the Name of the Property of the List you want to display in the Select ... 
                                ECHO.
                                SET /p name55=
                                ECHO.
                                ECHO.
                                ECHO Enter none if you want to add an Exta option of None in Select ...
                                ECHO.
                                SET /p name66=
                                ECHO.

                            :no_none_part1

                            ECHO.

                            IF NOT %name33% == select GOTO out_of_none_section1
                            IF %name66% == none GOTO none_section1
                            TIMEOUT 1
                            IF NOT %name66% == none GOTO no_none_section1 

                            :none_section1
                                SET edit_query=%edit_query% %name11%:%name22%:%name33%:%name44%:%name55%:none
                                GOTO out_all1
                            :no_none_section1
                                SET edit_query=%edit_query% %name11%:%name22%:%name33%:%name44%:%name55%
                                GOTO out_all1
                            :out_of_none_section1
                                SET edit_query=%edit_query% %name11%:%name22%:%name33%:%name44%

                            :out_all1
                            TIMEOUT 1

                            ECHO.
                            
                            CLS
                            ECHO.
                            ECHO Do you wish to add More Fields in the Form ? ( Y / N )
                            ECHO.
                            SET /p edit_again=
                            IF %edit_again% == Y GOTO edit_form_fields
                            IF %edit_again% == N GOTO edit_form_end

                            :edit_form_end
                                REM Table end
                                ECHO.
                                ECHO %edit_query%
                                ECHO.
                                TIMEOUT 1
                                %edit_query%
                                ECHO.
                                TIMEOUT 3
                                ECHO.
                                REM Table end

                            REM Tabe fields Settings
                            :view_end_part
                        REM Start Creating Edit View
                REM Custom View Edit
            REM Custom Views
            goto go_back_section
        :case_custom_seeds
            cls
            call :speak "s_start.vbs"
            REM php zaeem/s.php User name=s=zaeem:password=p=123456:email=s=zaeemtarrar3@gmail.com:role_id=i=1
            set seed_query=php zaeem/s.php
            echo.
            echo Write the name of the Seed ?
            echo.
            set /p seed_name=
            echo.
            set seed_query=%seed_query% %seed_name%
            echo.
            :start_seed_field
                cls
                echo.
                echo Activating Seed Field Installer ...
                set seed_single_field=
                :start_seed_prop
                    call :speak "m_info.vbs"
                    echo Write the Name of the Field ?
                    echo.
                    set /p field_name=
                    echo.
                    echo Type of the Field ? ( s = string , p = password , i = integer )
                    echo.
                    set /p field_type=
                    echo.
                    echo Give the Value you the field ? 
                    echo.
                    set /p seed_value=
                    cls
                    echo.
                    set seed_single_field=%seed_single_field%%field_name%=%field_type%=%seed_value%
                    echo.
                    echo Do you wish to add more Properties for the Particular Field ? ( Y / N )
                    echo.
                    set /p property_again=
                    echo.
                    if %property_again% == Y goto seed_prop_repeat
                    if %property_again% == N goto seed_prop_next

                    :seed_prop_repeat
                        set seed_single_field=%seed_single_field%:
                        goto start_seed_prop
                    :seed_prop_next
                        cls
                        echo.
                        set seed_query=%seed_query% %seed_single_field%
                        set seed_single_field=
                        echo.
                        call :speak "s_info2.vbs"
                        echo Do you wish to add more Fields for the Particular Seed ? ( Y / N )
                        echo.
                        set /p field_again=
                        echo.
                        if %field_again% == Y goto seed_field_repeat
                        if %field_again% == N goto seed_field_next

                        :seed_field_repeat
                            goto start_seed_field
                        :seed_field_next
                            cls
                            echo.
                            echo %seed_query%
                            php artisan make:seeder %seed_name%TableSeeder
                            %seed_query%
                            echo.
                            call :speak "s_end.vbs"
                            echo Seed Created Successfully !
                            echo.
            goto go_back_section
        :case_project_routes
            REM Setting up the Routes
                CLS 
                ECHO.
                ECHO Activating the Route Settings
                ECHO.
                TIMEOUT 1
                ECHO.
                php zaeem/r.php dashboard all
                ECHO.
                TIMEOUT 1
                ECHO.
                php zaeem/r.php site all
                ECHO.
                TIMEOUT 1
                ECHO.
                ECHO Note: Press ( RY if you Want to Start Routing From the Start and Refresh Routes Page )  
                ECHO.
                ECHO Do You Wish To Add More Routes ? ( Y / N )
                ECHO.
                TIMEOUT 1
                ECHO.
                SET /p route=
                IF %route% == N GOTO end_routes_part
                IF %route% == Y GOTO routes
                IF %route% == RY (
                    ECHO.
                    php zaeem/r.php reset
                    ECHO.
                    GOTO routes
                ) 

                :routes
                CLS
                ECHO.
                SET myroute=php zaeem/r.php
                ECHO.
                TIMEOUT 1
                ECHO.
                ECHO Enter the Route Type
                ECHO Press 1 for GET
                ECHO Press 2 for Resource
                ECHO.
                SET /p routetype=
                ECHO.
                TIMEOUT 1
                ECHO.
                IF %routetype% == 1 GOTO getroute
                IF %routetype% == 2 GOTO resourceroute
                IF NOT %routetype% == 1 (
                    IF NOT %routetype% == 2 GOTO end_routes_part
                )

                :getroute
                CLS 
                ECHO.
                ECHO Press 1 to Add the Route in the dashboard
                ECHO Press 2 to Add the Route in the Front Site
                ECHO.
                TIMEOUT 1
                ECHO.
                SET /p pos=
                ECHO.
                TIMEOUT 1
                ECHO.
                IF NOT %pos% == 1 (
                    IF NOT %pos% == 2 (
                        GOTO end_routes_part
                    )
                )
                ECHO.
                ECHO Note: It is Assumed that the Name of the Route will match the name of the Controller
                ECHO It is Connected To ... Enter Information In Accordance ... Thank you !
                ECHO Enter the Name of the Route ...
                ECHO.
                SET /p routename=
                ECHO.
                ECHO Enter the name of the Particular method where the Route will throw the Request
                ECHO.
                SET /p methodname=
                ECHO.
                ECHO Please Name the Route You have Created So far ... ( E.G. [test.index] )
                ECHO.
                SET /p callname=
                ECHO.
                TIMEOUT 1
                ECHO.
                IF %pos% == 1 SET repos=dashboard
                IF %pos% == 2 SET repos=site
                IF %routetype% == 1 SET reroutetype=get
                IF %routetype% == 2 SET reroutetype=resource
                SET myroute=%myroute% %repos% %reroutetype%:%routename%:%methodname%:%callname%
                ECHO.
                %myroute%
                ECHO.
                TIMEOUT 1
                ECHO.
                ECHO Route Created Successfully
                GOTO routeend



                :resourceroute
                CLS 
                ECHO.
                ECHO Press 1 to Add the Route in the dashboard
                ECHO Press 2 to Add the Route in the Front Site
                ECHO.
                TIMEOUT 1
                ECHO.
                SET /p pos=
                ECHO.
                TIMEOUT 1
                ECHO.
                IF NOT %pos% == 1 (
                    IF NOT %pos% == 2 (
                        GOTO end_routes_part
                    )
                )
                ECHO.
                ECHO Note: It is Assumed that the Name of the Route will match the name of the Controller
                ECHO It is Connected To ... Enter Information In Accordance ... Thank you !
                ECHO Enter the Name of the Route ...
                ECHO.
                SET /p routename=
                ECHO.
                TIMEOUT 1
                ECHO.
                IF %pos% == 1 SET repos=dashboard
                IF %pos% == 2 SET repos=site
                IF %routetype% == 1 SET reroutetype=get
                IF %routetype% == 2 SET reroutetype=resource
                SET myroute=%myroute% %repos% %reroutetype%:%routename%
                ECHO.
                %myroute%
                ECHO.
                TIMEOUT 1
                ECHO.
                ECHO Route Created Successfully
                GOTO routeend

                :routeend
                cls
                
                :end_routes_part

                REM Setting up the Routes
            goto go_back_section
        :case_database_migration
            cls
            echo.
            call :speak "db_migrate.vbs"
            echo Initializing Database migration ...
            echo.
            call :speak "db_migrate_question.vbs"
            echo Press M for First Migration
            echo Press R for Migration Refresh
            echo.
            set /p miger=
            echo.
            if %miger% == M php artisan migrate
            if %miger% == R php artisan migrate:refresh
            echo.
            goto go_back_section
        :case_database_seeding
            cls
            echo.
            call :speak "db_seed.vbs"
            echo Activating Seed Migrator ...
            echo.
            php zaeem/dbs.php
            echo.
            timeout 5
            echo.
            php artisan db:seed
            echo.
            goto go_back_section
        :case_list_views
            cls
            echo.
            call :speak "list_views.vbs"
            echo Following are List of all the Views :
            echo.
            php zaeem/lists.php resources/views view
            echo.
            pause
            goto go_back_section
        :case_list_routes
            cls
            echo.
            call :speak "list_routes.vbs"
            echo Following are List of all the Routes :
            echo.
            php zaeem/r.php site all
            echo.
            php zaeem/r.php dashboard all
            echo.
            pause
            goto go_back_section
        :case_list_controllers
            cls
            echo.
            call :speak "list_controllers.vbs"
            echo Following are List of all the Controllers :
            echo.
            php zaeem/lists.php app/Http/Controllers
            echo.
            pause
            goto go_back_section
        :case_list_models
            cls
            echo.
            call :speak "list_models.vbs"
            echo Following are List of all the Models :
            echo.
            php zaeem/lists.php app model
            echo.
            pause
            goto go_back_section
        :case_list_migrations
            cls
            echo.
            call :speak "list_migrations.vbs"
            echo Following are List of all the Migrations :
            echo.
            php zaeem/lists.php database/migrations
            echo.
            pause
            goto go_back_section
        :case_list_seeds
            cls
            echo.
            call :speak "list_seeds.vbs"
            echo Following are List of all the Seeds :
            echo.
            php zaeem/lists.php database/seeds
            echo.
            pause
            goto go_back_section
        :case_template_breaking
            cls
            echo.
            echo Activating the Template Breaker ...
            echo.
            echo Enter the Name of the Template. ( No Spaces )
            echo.
            set /p temp_name=
            echo.
            echo Enter the Number of Pages you wana make Seperating with a ":"
            echo.
            set /p temp_pages=
            echo.
            echo Enter the Section Names from the Template you wish to add as Extras
            echo Seperate them with ":"
            echo Use Simple yield when you wish to apply it
            echo Use the Syntax section:yield:3 where sectionis the Section Name and 3 is the Level
            echo How deep you wana print the Html tree for thr Yield content
            echo Sytax - header:yield:footer or header:navigation:section@yield@3:footer
            echo.
            set /p temp_section=
            echo.
            php zaeem/template.php %temp_name% .html classify
            php zaeem/template.php %temp_name% .html assets %temp_section%
            php zaeem/template.php %temp_name% .html pages %temp_pages%
            php zaeem/cf.php %temp_pages% %temp_pages%
            echo.
            goto go_back_section
        :case_project_refresh
            cls
            echo.
            call :speak "refresher_guide.vbs"
            echo Activating Project Refreshers ...
            echo.
            php artisan cache:clear
            echo.
            php artisan config:clear
            echo.
            composer dump-autoload
            echo.
            goto go_back_section
        :case_installing_library
            cls
            echo.
            call :speak "lib_install.vbs"
            echo Activating Library Installer ...
            echo.
            php zaeem/setup.php zaeem/Library_Table app/
            goto go_back_section
        :case_exit
            call :speak "goodbye.vbs"
            goto end_file

        :invalid_section
            cls
            call :speak "invalid.vbs"
            cls

    :go_back_section
        echo.
        cls
        goto main_menu_section
        
REM The Main Project Body



:my_self_methods
    :speak
        start zaeem/%~1
        exit /b
    :destroy
        del zaeem/%~1
        exit /b
    
    :main_menu
        cls
        echo.
        echo     Welome to the Weblo Applo Auto Bot !!!
        echo.
        echo               Main Menu
        echo.
        echo  Press 1    for     Removing Migration Bug
        echo  Press 2    for     Installing Initial Migrations and Models
        echo  Press 3    for     Installing Initial Seeds
        echo  Press 4    for     Creating the Public Storage
        echo  Press 5    for     Creating the User Authentication
        echo  Press 6    for     Installing Initial Controllers
        echo  Press 7    for     Setting up the Ace Dashboard Layout
        echo  Press 8    for     Setting the Database in the ENV
        echo  Press 9    for     Creating Custom Migration or Model Or Both
        echo  Press 10    for     Creating Custom Controller
        echo  Press 11    for     Creating Custom View
        echo  Press 12    for     Creating Custom Seeds
        echo  Press 13    for     Creating Project Routes
        echo  Press 14    for     Migrating Models / Migrations to Database
        echo  Press 15    for     Seeding Data to the Database
        echo  Press 16    for     Template Breaking
        echo  Press 17    for     Viewing the List of views
        echo  Press 18    for     Viewing the List of routes
        echo  Press 19    for     Viewing the List of controllers
        echo  Press 20    for     Viewing the List of models
        echo  Press 21    for     Viewing the List of migrations
        echo  Press 22    for     Viewing the List of seeds
        echo  Press 23    for     Refreshing the Project
        echo  Press 24    for     Installing Form/Table Libraries   
        echo  Press 25    to      Exit   
        echo.  
        exit /b


:end_file
    
    echo.
    REM Pause for the Voices to get Through
        pause
    REM Pause for the Voices to get Through
    REM call :destroy "welcome.vbs"
    REM call :destroy "welcome_guide.vbs"
