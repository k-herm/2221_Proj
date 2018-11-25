$(document).ready(function() {
    addNavButtons();
});

function addNavButtons() {
    $('#navCell').click(function() {
        clearTab();
        $('.cells').css('display', 'flex');
    });

    $('#navDelivery').click(function() {
        clearTab();
        $('.delivery').css('display', 'grid');
    });

    $('#navVisitor').click(function() {
        clearTab();
        $('.visitor').css('display', 'grid');
    });

    $('#navInmate').click(function() {
        clearTab();
        $('.inmate').css('display', 'grid');
    });
}

function clearTab() {
    $('.delivery').css('display', 'none');
    $('.cells').css('display', 'none');
    $('.inmate').css('display', 'none');
    $('.visitor').css('display', 'none');
    $('.results').html('');
}

$('#vSearchButton').click(function() {
    let iid = $('#idv').val();
    let iname = $('#namev').val();
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
    let iid = $('#idi').val();
    let iname = $('#namei').val();

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

$('#vStatsButton').click(function() {
    let stat = 'vstat';
    $.ajax({
        method: "GET",
        url: 'VisitorsSQL.php',
        data: {
            stats: stat
        },
        success: function(html) {
            $('.results').html(html);
        }
    });
});

$('#dStatsButton').click(function() {
    let stat = 'dstat';
    $.ajax({
        method: "GET",
        url: 'DeliverySQL.php',
        data: {
            stats: stat
        },
        success: function(html) {
            $('.results').html(html);
        }
    });
});