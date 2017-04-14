<table class="bordered responsive-table">
    <tr>
        <th>Title</th>
        <th>Release Date</th>
        <th>Tickets Sold</th>
        <th>Gross Revenue</th>
    </tr>
    <?php foreach($movies as $movie):
        include 'views/formatting.php';
    ?>
        <tr>
            <td><?= $anchor ?></td>
            <td><?= $listDate ?></td>
            <td><?= $tickets ?></td>
            <td><?= $gross ?></td>
        </tr>
    <?php endforeach; ?>    
</table>