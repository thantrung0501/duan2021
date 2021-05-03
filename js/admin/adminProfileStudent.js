var id = parseURLParams(window.location.href).id[0];

$.ajax({
    type: "POST",
    url: "../../action/center/GetRegistAccountDetail.php",
    data: "accountID="+ id,
    dataType: "json",
    success: function (response) {
        $("#fullName").text(response.FullName);
        $("#gender").text(response.Gender);
        $("#birthday").text(response.DateOfBirth);
        $("#nation").text(response.Nation);
        $("#CMND").text(response.Identification);
        $("#residence").text(response.PermanentResidence);
        $("placeOfBirth").text(response.ProvinceName);
        $("#email").text(response.Email);
        $("#phone").text(response.PhoneNumber);
        $("#address").text(response.Address);
        $("#priority").text(response.IsPrioritize);
        $("#area").text(response.Area);
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
        console.log(response);
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