/* Mobile Device Detector
 * Rizzonet.com
 * Liscensed under the MIT License (MIT-LICENSE.txt)
 * http://www.opensource.org/licenses/mit-license.php
 * Created: 2012-8-23 | Updated: 2012-8-23
*/


(function ($) {
    "use strict";

    var ua = navigator.userAgent.toLowerCase();

    console.log(ua);
    console.log(ua.indexOf("iphone"));
    console.log(ua.indexOf("ipad"));
    console.log(ua.indexOf("ipod"));

    $.isiOS = function () {
        if (ua.indexOf("iphone") !== -1 || ua.indexOf("ipad") !== -1 || ua.indexOf("ipod") !== -1) {
            return true;
        } else {
            return false;
        }
    };

    $.isAndroid = function () {
        return (ua.indexOf("android") > -1) ? true : false;
    };

    $.isiPhone = function () {
        return (ua.indexOf("iphone") > -1 && ua.indexOf("ipod") == -1) ? true : false;
    };

    $.isiPad = function () {
        return (ua.indexOf("ipad") > -1) ? true : false;
    };

    $.isiPod = function () {
        return (ua.indexOf("ipod") > -1) ? true : false;
    };


})(jQuery);