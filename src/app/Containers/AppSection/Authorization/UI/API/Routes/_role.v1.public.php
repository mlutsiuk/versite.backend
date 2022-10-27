<?php

/**
 * @apiDefine RoleSuccessSingleResponse
 * @apiSuccessExample {json} Success-Response:
HTTP/1.1 200 OK
{
    "data":{
        "object":"Role",
        "id":"eqwja3vw94kzmxr0",
        "name":"admin",
        "description":"All permissions",
        "display_name":"Admin",
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

