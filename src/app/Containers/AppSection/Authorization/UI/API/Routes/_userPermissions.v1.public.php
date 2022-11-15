<?php

/**
 * @apiDefine UserPermissionsSuccessSingleResponse
 * @apiSuccessExample {json} Success-Response:
HTTP/1.1 200 OK
{
    "data":{
        "object": "User",
        "id": "307",
        "name": "Maksym Lutsiuk",
        "nickname": "mlutsiuk",
        "email": "maksym.lutsiuk@oa.edu.ua",
        "avatar": "https://lh3.googleusercontent.com/a/ALm5wu0D...",
        "email_verified_at": "2022-10-26T03:02:56.000000Z",
        "is_registration_completed": true,
        "created_at": "2022-06-14T06:19:18.000000Z",
        "updated_at": "2022-06-14T06:25:00.000000Z",
        "permissions":{
            "data":[
                {
                    "object":"Permission",
                    "id":"n9kq6345javb05je",
                    "name":"update-some-resource",
                    "description":"Allow to edit SomeResource",
                    "display_name":"Edit SomeResource"
                },
                {
                    "object":"Permission",
                    "id":"999q6345javb05je",
                    "name":"create-some-resource",
                    "description":"Allow to create SomeResource",
                    "display_name":"Create SomeResource"
                }
            ]
        }
    },
    "meta":{
        "include":[

        ],
        "custom":[

        ]
    }
}
 */

