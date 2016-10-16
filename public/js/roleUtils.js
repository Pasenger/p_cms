/**
 * Created by pasenger on 2016/10/16.
 */

/**
 * 根据ROLE_ID判断权限
 * @param id
 * @return int
 */
function getRolePermission(id) {
    var role = 1;
    switch (id) {
        case "100":   //系统管理员
            role = 1;
            break;
        case "200":   //全国
            role = 2;
            break;
        case "300":   //地市
            role = 3;
            break;
        default:
    }

    return role;
}