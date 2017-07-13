var app = {

    getJobs: function () {
        $.ajax({
            url: job_url,
            data: {user_id: user_id},
            dataType: 'json',
            beforeSend: function () {

                $('#list').html(app.preload());
                $('#description').val('');
            },
            success: function (e) {
                var html = '';
                html += "<tr>";
                html += "<td># </td>";
                html += "<td>Job Description</td>";
                html += "<td>Status</td>";
                html += "</tr>";
                $.each(e.data, function (i, v) {
                    html += "<tr>";
                    html += "<td>" + v.id + "</td>";
                    html += "<td>" + v.description + "</td>";
                    html += "<td>" + (v.status == 0 ? 'OPEN' : 'DONE') + "</td>";
                    html += "</tr>";
                });
                $('#list').html('<table class="table">' + html + ' </table>');
                 
            },  
            
        });
    },

    createJobs: function () {

        $('button[name=add_job]').click(function () {
            $.ajax({
                url: job_url,
                data: $('#add_job_form').serialize(),
                dataType: 'json',
                type: 'post',
                success: function (e) {
                    app.getJobs();
                }
            });
        })

        var user_lengh = $('#user_list_drop').length;

        if (user_lengh > 0) {
            app.getUsersDropDown();
        }

    },
    getQuotes: function () {
        $.ajax({
            url: quote_url,
            data: {user_id: user_id},
            dataType: 'json',
            beforeSend: function () {

                $('#list').html(app.preload());
                $('#description').val('');
            },
            success: function (e) {
                var html = '';
                html += "<tr>";
                html += "<td># </td>";
                html += "<td>Quote Description</td>";
                html += "</tr>";
                $.each(e.data, function (i, v) {
                    html += "<tr>";
                    html += "<td>" + v.id + "</td>";
                    html += "<td>" + v.description + "</td>";
                    html += "</tr>";
                });
                $('#list').html('<table class="table">' + html + ' </table>');
                 
            },  
        });
    },
    createQuote: function () {
        $('button[name=add_quote]').click(function () {
            $.ajax({
                url: quote_url,
                data: $('#add_quote_form').serialize(),
                dataType: 'json',
                type: 'post',
                success: function (e) {
                    app.getQuotes();
                }
            });
        });


        var user_lengh = $('#user_list_drop').length;

        if (user_lengh > 0) {
            app.getUsersDropDown();
        }

    },
    getUsersDropDown: function () {
        $.ajax({
            url: user_url,
            //data: {user_id: user_id},
            beforeSend: function () {

                $('#user_list_drop').html(app.preload());
            },
            dataType: 'json',
            success: function (e) {
                var html = '<select name=\'user_id\'>';
                $.each(e.data, function (i, v) {
                    html += "<option value='" + v.id + "'>" + v.name + "</option>";
                });

                html += "</select>";
                $('#user_list_drop').html(html);


                $('select').material_select();

            }
        });
    },
    getUsers: function () {
        $.ajax({
            url: user_url,
            //data: {user_id: user_id},
            dataType: 'json',
            beforeSend: function () {

                $('#list').html(app.preload());
                //$('#description').val('');
            },
            success: function (e) {
                var html = '';
                html += "<tr>";
                html += "<td># </td>";
                html += "<td>Name</td>";
                html += "<td>Email</td>";
                html += "<td>role</td>";
                html += "</tr>";
                $.each(e.data, function (i, v) {
                    html += "<tr>";
                    html += "<td>" + v.id + "</td>";
                    html += "<td>" + v.name + "</td>";
                    html += "<td>" + v.email + "</td>";
                    html += "<td>" + v.role + "</td>";

                    html += "</tr>";
                });
                $('#list').html('<table class="table">' + html + ' </table>');
                
                 
            }, 
        });
    }
    ,
    preload: function () {
        var preload = '<h4>loading...</h4><div class="progress"><div class="indeterminate"></div></div>';
        return preload;
    },
    remorepreload: function () {
        var lenght = $('.table').size();
 
        if (lenght == 0)
            $('#list').html('no data');
    }

}