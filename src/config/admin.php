<?php

return [
    "links" => [
        ["admin::dashboard", '', "dashboard"],
        ["admin::dashboard.users.index", '', "users"],
        ["admin::dashboard.posts.index", '', "posts"],
        ["admin::dashboard.roles.index", '', "roles"],
        ["admin::dashboard.tags.index", '', "tags"],
        ["admin::dashboard.categories.index", '', "categories"],
        ["uploadManager::upload.manager", '', "upload Manager"],
        ["admin::dashboard.users.show", '["username" => auth()->user()->username]', "settings"],
    ],

    'paginate' => 22,
];
