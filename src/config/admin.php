<?php

return [
    "links" => [
        ["admin::dashboard", '', "home"],
        ["admin::dashboard.users.index", '', "users"],
        ["admin::dashboard.posts.index", '', "posts"],
        ["admin::dashboard.roles.index", '', "roles"],
        ["admin::dashboard.tags.index", '', "tags"],
        ["admin::dashboard.categories.index", '', "categories"],
        ["admin::dashboard.users.show", '["username" => auth()->user()->username]', "settings"],
    ],

    'paginate' => 22,
];
