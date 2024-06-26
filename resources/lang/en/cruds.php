<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'approved'                 => 'Approved',
            'approved_helper'          => ' ',
            'user_type'                => 'User Type',
            'user_type_helper'         => ' ',
            'phone_number'             => 'Phone Number',
            'phone_number_helper'      => ' ',
        ],
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'userAlert' => [
        'title'          => 'User Alerts',
        'title_singular' => 'User Alert',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'alert_text'        => 'Alert Text',
            'alert_text_helper' => ' ',
            'alert_link'        => 'Alert Link',
            'alert_link_helper' => ' ',
            'user'              => 'Users',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
        ],
    ],
    'client' => [
        'title'          => 'Clients',
        'title_singular' => 'Client',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'user'              => 'User',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'technical' => [
        'title'          => 'Technicals',
        'title_singular' => 'Technical',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'user'              => 'User',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'clientManagment' => [
        'title'          => 'Client Managment',
        'title_singular' => 'Client Managment',
    ],
    'generalSetting' => [
        'title'          => 'General Settings',
        'title_singular' => 'General Setting',
    ],
    'slider' => [
        'title'          => 'Sliders',
        'title_singular' => 'Slider',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'image'              => 'Image',
            'image_helper'       => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'body'               => 'Body',
            'body_helper'        => ' ',
            'button_name'        => 'Button Name',
            'button_name_helper' => ' ',
            'link'               => 'Link',
            'link_helper'        => ' ',
            'publish'            => 'Publish',
            'publish_helper'     => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'service' => [
        'title'          => 'Services',
        'title_singular' => 'Service',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'short_description'        => 'Short Description',
            'short_description_helper' => ' ',
            'description'              => 'Description',
            'description_helper'       => ' ',
            'featured'                 => 'Featured',
            'featured_helper'          => ' ',
            'image'                    => 'Image',
            'image_helper'             => ' ',
            'icon'                     => 'Icon',
            'icon_helper'              => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'faqManagement' => [
        'title'          => 'FAQ Management',
        'title_singular' => 'FAQ Management',
    ],
    'faqCategory' => [
        'title'          => 'Categories',
        'title_singular' => 'Category',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'category'          => 'Category',
            'category_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'faqQuestion' => [
        'title'          => 'Questions',
        'title_singular' => 'Question',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'category'          => 'Category',
            'category_helper'   => ' ',
            'question'          => 'Question',
            'question_helper'   => ' ',
            'answer'            => 'Answer',
            'answer_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'contactu' => [
        'title'          => 'Contactus',
        'title_singular' => 'Contactu',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'email'             => 'Email',
            'email_helper'      => ' ',
            'subject'           => 'Subject',
            'subject_helper'    => ' ',
            'message'           => 'Message',
            'message_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'about' => [
        'title'          => 'About',
        'title_singular' => 'About',
        'fields'         => [
            'id'                          => 'ID',
            'id_helper'                   => ' ',
            'logo'                        => 'Logo',
            'logo_helper'                 => ' ',
            'email'                       => 'Email',
            'email_helper'                => ' ',
            'created_at'                  => 'Created at',
            'created_at_helper'           => ' ',
            'updated_at'                  => 'Updated at',
            'updated_at_helper'           => ' ',
            'deleted_at'                  => 'Deleted at',
            'deleted_at_helper'           => ' ',
            'site_name'                   => 'Site Name',
            'site_name_helper'            => ' ',
            'phone'                       => 'Phone',
            'phone_helper'                => ' ',
            'phone_2'                     => 'Phone 2',
            'phone_2_helper'              => ' ',
            'address'                     => 'Address',
            'address_helper'              => ' ',
            'description'                 => 'Description',
            'description_helper'          => ' ',
            'footer_description'          => 'Footer Description',
            'footer_description_helper'   => ' ',
            'how_do_we_work_video'        => 'How Do We Work Video',
            'how_do_we_work_video_helper' => ' ',
            'count_experience'            => 'Count Experience',
            'count_experience_helper'     => ' ',
            'count_projects'              => 'Count Projects',
            'count_projects_helper'       => ' ',
            'partners'                    => 'Partners',
            'partners_helper'             => ' ',
        ],
    ],
    'teamWork' => [
        'title'          => 'Team Works',
        'title_singular' => 'Team Work',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'job'               => 'Job',
            'job_helper'        => ' ',
            'photo'             => 'Photo',
            'photo_helper'      => ' ',
            'twitter'           => 'Twitter',
            'twitter_helper'    => ' ',
            'linkedin'          => 'Linkedin',
            'linkedin_helper'   => ' ',
            'facebook'          => 'Facebook',
            'facebook_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'requestService' => [
        'title'          => 'Request Service',
        'title_singular' => 'Request Service',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'service'                 => 'Service',
            'service_helper'          => ' ',
            'user'                    => 'User',
            'user_helper'             => ' ',
            'message'                 => 'Message',
            'message_helper'          => ' ',
            'place'                 => 'Place',
            'place_helper'          => ' ',
            'visiting_form'           => 'Visiting Form',
            'visiting_form_helper'    => ' ',
            'offer_price_file'        => 'Offer Price File',
            'offer_price_file_helper' => ' ',
            'offer_price'             => 'Offer Price',
            'offer_price_helper'      => ' ',
            'status'                  => 'Status',
            'status_helper'           => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
            'edits'                   => 'Edits',
            'edits_helper'            => ' ',
        ],
    ],
    'contract' => [
        'title'          => 'Contracts',
        'title_singular' => 'Contract',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'user'                   => 'User',
            'user_helper'            => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
            'request_service'        => 'Request Service',
            'request_service_helper' => ' ',
            'name'                   => 'Name',
            'name_helper'            => ' ',
            'contract_type'          => 'Contract Type',
            'contract_type_helper'   => ' ',
            'city'                   => 'City',
            'city_helper'            => ' ',
            'address'                => 'Address',
            'address_helper'         => ' ',
            'contract_value'         => 'Contract Value',
            'contract_value_helper'  => ' ',
            'start_date'             => 'Start Date',
            'start_date_helper'      => ' ',
            'end_date'               => 'End Date',
            'end_date_helper'        => ' ',
            'mngr_name'              => 'Mngr Name',
            'mngr_name_helper'       => ' ',
            'mngr_email'             => 'Mngr Email',
            'mngr_email_helper'      => ' ',
            'mngr_phone'             => 'Mngr Phone',
            'mngr_phone_helper'      => ' ',
            'contract'               => 'Contract',
            'contract_helper'        => ' ',
        ],
    ],
    'appointment' => [
        'title'          => 'Appointments',
        'title_singular' => 'Appointment',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'contract'             => 'Contract',
            'contract_helper'      => ' ',
            'date'                 => 'Date',
            'date_helper'          => ' ',
            'time'                 => 'Time',
            'time_helper'          => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'title'                => 'Title',
            'title_helper'         => ' ',
            'notes'                => 'Notes',
            'notes_helper'         => ' ',
            'user'                 => 'technical',
            'user_helper'          => ' ',
            'finish_code'          => 'Finish Code',
            'finish_code_helper'   => ' ',
            'status'               => 'Status',
            'status_helper'        => ' ',
            'reject_reason'        => 'Reject Reason',
            'reject_reason_helper' => ' ',
        ],
    ],

];
