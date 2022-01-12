$(document).ready((e) => {
    var province = $("#province");
    var data_province;
    var district = $("#district");

    $.ajax({
        "url": "https://provinces.open-api.vn/api/?depth=2",
        "type": "GET",
        "dataType": "JSON",
        "success": function (data) {
            data_province = data;
            data.forEach(element => {
                province.append("<option value='" + element.name + "' data-id='" + element.code + "'>" + element.name + "</option>")
            });
        },
        "errors": function (err) {
            alert(err);
        }
    });

    province.change((e) => {
        let objProvince = data_province.find(x => x.name == province.val());
        let dataDistrict = objProvince.districts;
        district.empty();
        district.append("<option selected disabled> Chọn Quận/Huyện </option>");
        dataDistrict.forEach(el => {
            district.append("<option value='" + el.name + "'>" + el.name + "</option>");
        });
    });
})

