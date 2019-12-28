<?php include 'includes/header.php' ?>

<div>
    <h1>Results:</h1>
    <table>
        <tr>
            <th>
                Email
            </th>
            <th>
                Name
            </th>
        </tr>
        <?php foreach($data['results'] as $result) { ?>
            <tr>
                <td>
                    <?php echo $result['email'] ?>
                </td>
                <td>
                    <?php echo $result['name'] ?>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
<div>
    <a href="/">RETURN TO HOME</a>
    <a href="/search-form">RETURN TO SEARCH</a>
</div>


<?php include 'includes/footer.php' ?>
