<div class="container">

    <div class="row">

        <?php for ( $i = 1; $i <= count($data['news_list']); $i++) {
            $item = $i - 1;
            ?>
            <div class="col-md-<?= $item == 0 ? 8 : 4 ?>">
                <img src="<?= $data['news_list'][$item]->urlToImage ?>" alt="" style="width: <?= $item == 0 ? '700px' : '350px' ?>; padding-bottom: 10px">
                <p><?= $data['news_list'][$item]->title ?></p>
                <p><?= $data['news_list'][$item]->publishedAt ?></p>
                <p><a class="btn btn-secondary" href="<?= $data['news_list'][$item]->url ?>" role="button">View details &raquo;</a></p>
            </div>
        <?php }?>

    </div>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>

    <hr>
</div>
