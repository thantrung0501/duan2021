var id = parseURLParams(window.location.href).id[0];

$.ajax({
    type: "POST",
    url: "../../action/center/GetRegistAccountDetail.php",
    data: "accountID="+ id,
    dataType: "json",
    success: function (response) {
        $("#fullName").text(response.FullName);
        $("#gender").text(response.Gender);
        var _birthday = response.DateOfBirth.split("-");
        var birthday = _birthday[2] + "/" + _birthday[1] + "/" +_birthday[0];
        $("#birthday").text(birthday);
        $("#nation").text(response.Nation);
        $("#CMND").text(response.Identification);
        $("#residence").text(response.PermanentResidence);
        $("#placeOfBirth").text(response.ProvinceName);
        $("#email").text(response.Email);
        $("#phone").text(response.PhoneNumber);
        $("#address").text(response.Address);
        var isPrioritized;
        switch (response.IsPrioritize) {
            case "0":
                isPrioritized ="Trống";
                break;
            case "1":
                isPrioritized ="Không ưu tiên";
                break;
            case "2":
                isPrioritized ="Có ưu tiên";
                break;
            default:
                break;
        }
        $("#priority").text(isPrioritized);
        var area;
        switch (response.Area) {
            case "0":
                area ="Trống";
                break;
            case "1":
                area ="KV1";
                break;
            case "2":
                area ="KV2-NT";
                break;
            case "3":
                area ="KV2";
                break;
            case "4":
                area ="KV3";
                break;        
            default:
                break;
        }
        $("#area").text(area);
        $("#hk1L10").text(response.HKIGrade10);
        $("#hk2L10").text(response.HKIIGrade10);
        $("#l10").text(response.TBGrade10);
        $("#hk1L11").text(response.HKIGrade11);
        $("#hk2L11").text(response.HKIIGrade11);
        $("#l11").text(response.TBGrade11);
        $("#hk1L12").text(response.HKIGrade12);
        $("#hk2L12").text(response.HKIIGrade12);
        $("#l12").text(response.TBGrade12);
        $("#gradYear").text(response.GraduatingYear);
        $("#math").text(response.Math);
        $("#liter").text(response.Literature);
        $("#eng").text(response.English);
        $("#physic").text(response.Physics);
        $("#chem").text(response.Chemistry);
        $("#bio").text(response.Biology);
        $("#his").text(response.History);
        $("#geo").text(response.Geography);
        $("#GDCD").text(response.GDCD);
    }
});

function parseURLParams(url) {
    var queryStart = url.indexOf("?") + 1,
        queryEnd   = url.indexOf("#") + 1 || url.length + 1,
        query = url.slice(queryStart, queryEnd - 1),
        pairs = query.replace(/\+/g, " ").split("&"),
        parms = {}, i, n, v, nv;

    if (query === url || query === "") return;

    for (i = 0; i < pairs.length; i++) {
        nv = pairs[i].split("=", 2);
        n = decodeURIComponent(nv[0]);
        v = decodeURIComponent(nv[1]);

        if (!parms.hasOwnProperty(n)) parms[n] = [];
        parms[n].push(nv.length === 2 ? v : null);
    }
    return parms;
}