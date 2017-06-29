<body>

<table id="list">
    <tr id="header">

    </tr>

</table>

</body>
<script>
    var c = [100, 200, 500, 800, 1200];
    var sp_start = 100;
    var sp_end = 5000;
    var sp_step = 100;

    var headerTxt = '<th>m3</th>';

    for(var i = 0; i < c.length; i++)
        headerTxt += '<th>' + c[i] + '</th>'

    document.getElementById('header').innerHTML = headerTxt;

    var row;

    for(i = sp_start; i <= sp_end; i += sp_step)
    {
        row = document.createElement('tr');

        var rowElements = '<td>' + i + '</td>';

        for(var j = 0; j < c.length; j++)
            rowElements += '<td>' + Math.ceil(i / c[j]) + '</td>'

        row.innerHTML = rowElements;

        document.getElementById('list').appendChild(row);
    }

</script>