<?php

$config = array(
    'login' => array(
        array(
            'field' => 'userName',
            'label' => 'Username',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required'
        ),
    ),
    'reg' => array(
        array(
            'field' => 'userName',
            'label' => 'Username',
            'rules' => 'required|min_length[5]'
        ),
        array(
            'field' => 'userEmail',
            'label' => 'EMAIL',
            'rules' => 'trim|required|valid_email'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required|min_length[8]'
        ),
        array(
            'field' => 'repassword',
            'label' => 'Password',
            'rules' => 'trim|required|matches[password]'
        ),
        array(
            'field' => 'userType',
            'label' => 'Role',
            'rules' => 'required|in_list[1,2]'
        ),
    ),
    'system' => array(
        array(
            'field' => 'userName',
            'label' => 'Username',
            'rules' => 'required|min_length[5]'
        ),
        array(
            'field' => 'userPassword',
            'label' => 'Password',
            'rules' => 'trim|required|min_length[8]'
        ),
        array(
            'field' => 'reuserPassword',
            'label' => 'Password',
            'rules' => 'trim|required|matches[userPassword]'
        ),
    )
);

$config['company'] = array(
    array(
        'field' => 'title',
        'label' => 'company title',
        'rules' => 'trim|required|min_length[3]'
    ),
    array(
        'field' => 'type',
        'label' => 'company industry',
        'rules' => 'required|is_natural_no_zero'
    ),
    array(
        'field' => 'people',
        'label' => 'company people',
        'rules' => 'required|is_natural_no_zero'
    ),
    array(
        'field' => 'location',
        'label' => 'company location',
        'rules' => 'required|is_natural_no_zero'
    ),
    array(
        'field' => 'description',
        'label' => 'company description',
        'rules' => 'required|min_length[5]'
    ),
    array(
        'field' => 'website',
        'label' => 'company website',
        'rules' => 'valid_url'
    ),
    array(
        'field' => 'address',
        'label' => 'company address',
        'rules' => 'required|min_length[5]'
    ),
);
$config['jobs'] = array(
    array(
        'field' => 'jobTitle',
        'label' => 'job title',
        'rules' => 'trim|required|min_length[3]'
    ),
    array(
        'field' => 'jobType',
        'label' => 'job industry',
        'rules' => 'required|is_natural_no_zero'
    ),
    array(
        'field' => 'jobLocation',
        'label' => 'job location',
        'rules' => 'required|is_natural_no_zero'
    ),
    array(
        'field' => 'jobAward',
        'label' => 'job award',
        'rules' => 'required|is_natural_no_zero'
    ),
    array(
        'field' => 'jobProfessor',
        'label' => 'job professor',
        'rules' => 'required|is_natural_no_zero'
    ),
    array(
        'field' => 'jobDescription',
        'label' => 'job description',
        'rules' => 'required|min_length[5]'
    ),
    array(
        'field' => 'jobTags',
        'label' => 'job Tags',
        'rules' => array('required', array('error_tag_value', function($value) {
            $t = array_filter(explode(',', $value));
            if(count($t) > 0) {
                return true;
            } else {
                return false;
            }
        }))
    ),
    array(
        'field' => 'salary',
        'label' => 'job salary',
        'rules' => 'required|is_natural_no_zero'
    ),
    array(
        'field' => 'experience',
        'label' => 'job experience',
        'rules' => 'integer'
    ),
    array(
        'field' => 'endDay',
        'label' => 'job endDay',
        'rules' => array(array('error_time_value', function($value) {
            if(empty($value)) {
                return true;
            }
            $t = strtotime($value);
            if($t > time()) {
                return true;
            } else {
                return false;
            }
        }))
    )
);
$config['resume'] = array(
    array(
        'field' => 'realName',
        'label' => 'realname',
        'rules' => 'trim|required|min_length[2]'
    ),
    array(
        'field' => 'email',
        'label' => 'email',
        'rules' => 'required|valid_email'
    ),
    array(
        'field' => 'phone',
        'label' => 'phone',
        'rules' => 'required|required'
    ),
    array(
        'field' => 'birthday',
        'label' => 'birthday',
        'rules' => 'required|required'
    ),
    array(
        'field' => 'award',
        'label' => 'award',
        'rules' => 'required|is_natural_no_zero'
    ),
    array(
        'field' => 'jobLocation',
        'label' => 'where job location',
        'rules' => 'required|is_natural_no_zero'
    ),
    array(
        'field' => 'jobCategory',
        'label' => 'job category',
        'rules' => 'required|is_natural_no_zero'
    ),
    array(
        'field' => 'jobProfessor',
        'label' => 'job professor',
        'rules' => 'required|is_natural_no_zero'
    ),
    array(
        'field' => 'salary',
        'label' => 'wish salary',
        'rules' => 'required|is_natural_no_zero'
    ),
);