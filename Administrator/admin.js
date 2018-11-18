$(document).ready(function() {
    addNavButtons();
});

function addNavButtons() {
    $('#navCell').click(function() {
        clearTab();
        $('.cells').css('display', 'block');
    });

    $('#navDelivery').click(function() {
        clearTab();
        $('.delivery').css('display', 'block');
    });

    $('#navVisitor').click(function() {
        clearTab();
        $('.visitor').css('display', 'block');
    });

    $('#navInmate').click(function() {
        clearTab();
        $('.inmate').css('display', 'block');
    });
}

function clearTab() {
    $('.delivery').css('display', 'none');
    $('.cells').css('display', 'none');
    $('.inmate').css('display', 'none');
    $('.visitor').css('display', 'none');
}

$('#vSearchButton').click(function() {
    let iid = $('#iid').val();
    let iname = $('#iname').val();
    let vid = $('#vid').val();
    let vname = $('#vname').val();
    let vdate = $('#vdate').val();

    $.ajax({
        method: "POST",
        url: 'VisitorsSQL.php',
        data: {
            inmateName: iname,
            inmateID: iid,
            visitorID: vid,
            visitorName: vname,
            visitorDate: vdate
        },
        success: function(html) {
            $('.results').html(html);
        }
    });
});

$('#iSearchButton').click(function() {
    let iid = $('#iid').val();
    let iname = $('#iname').val();

    $.ajax({
        method: "POST",
        url: 'InmateSQL.php',
        data: {
            inmateName: iname,
            inmateID: iid
        },
        success: function(html) {
            $('.results').html(html);
        }
    });
});

$('#dSearchButton').click(function() {
    let did = $('#did').val();
    let dname = $('#dname').val();

    $.ajax({
        method: "POST",
        url: 'DeliverySQL.php',
        data: {
            deliveryName: dname,
            deliveryID: did
        },
        success: function(html) {
            $('.results').html(html);
        }
    });
});

$('#cSearchButton').click(function() {
    $.ajax({
        url: 'CellSQL.php',
        success: function(html) {
            $('.results').html(html);
        }
    });
});