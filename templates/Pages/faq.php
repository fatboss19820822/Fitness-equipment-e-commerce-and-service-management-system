<!-- In default.ctp layout or relevant layout file -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
    #faqAccordion .card {
        background-color: #1e1e1e;
        border: 1px solid #2a2a2a;
        margin-bottom: 10px;
        border-radius: 10px;
    }

    #faqAccordion .card-header {
        background-color: transparent;
        border-bottom: 1px solid #333;
        padding: 0;
    }

    #faqAccordion .btn-link {
        color: #f0f0f0;
        font-family: "Varela Round", sans-serif;
        font-weight: 600;
        font-size: 1.1rem;
        text-decoration: none;
        padding: 15px 20px;
        display: block;
        text-align: left;
        width: 100%;
        border-radius: 10px 10px 0 0;
    }

    #faqAccordion .btn-link:hover,
    #faqAccordion .btn-link:focus {
        background-color: #2c2c2c;
        color: #ffffff;
        text-decoration: none;
    }



    h2.text-center.mt-4 {
        font-family: "Varela Round", sans-serif;
        color: #ffffff;
        margin-bottom: 30px;
        font-weight: 700;
    }

    /* Optional: Add smooth animation */
    .accordion .collapse {
        transition: height 0.35s ease;
    }
    p{
        color: white;
    }

</style>

<h2 class="text-center mt-4">Frequently Asked Questions</h2>
<div class="accordion" id="faqAccordion">
    <div class="card">
        <div class="card-header" id="q1">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left collapsed" type="button"
                        data-toggle="collapse" data-target="#a1" aria-expanded="false"
                        aria-controls="a1">
                    <?= $this->ContentBlock->text('faq-q1'); ?>
                </button>
            </h2>
        </div>
        <div id="a1" class="collapse" aria-labelledby="q1" data-parent="#faqAccordion">
            <div class="card-body">
                <p style="color: white"><?= $this->ContentBlock->html('faq-a1'); ?></p>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header" id="q2">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left collapsed" type="button"
                        data-toggle="collapse" data-target="#a2" aria-expanded="false"
                        aria-controls="a2">
                    <?= $this->ContentBlock->text('faq-q2'); ?>

                </button>
            </h2>
        </div>
        <div id="a2" class="collapse" aria-labelledby="q2" data-parent="#faqAccordion">
            <div class="card-body">
                <p style="color: white"><?= $this->ContentBlock->html('faq-a2'); ?></p>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header" id="q3">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left collapsed" type="button"
                        data-toggle="collapse" data-target="#a3" aria-expanded="false"
                        aria-controls="a3">
                    <?= $this->ContentBlock->text('faq-q3'); ?>
                </button>
            </h2>
        </div>
        <div id="a3" class="collapse" aria-labelledby="q3" data-parent="#faqAccordion">
            <div class="card-body">
                <p style="color: white"><?= $this->ContentBlock->html('faq-a3'); ?></p>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header" id="q4">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left collapsed" type="button"
                        data-toggle="collapse" data-target="#a4" aria-expanded="false"
                        aria-controls="a4">
                    <?= $this->ContentBlock->text('faq-q4'); ?>
                </button>
            </h2>
        </div>
        <div id="a4" class="collapse" aria-labelledby="q4" data-parent="#faqAccordion">
            <div class="card-body">
                <p style="color: white"><?= $this->ContentBlock->html('faq-a4'); ?></p>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header" id="q5">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left collapsed" type="button"
                        data-toggle="collapse" data-target="#a5" aria-expanded="false"
                        aria-controls="a5">
                    <?= $this->ContentBlock->text('faq-q5'); ?>
                </button>
            </h2>
        </div>
        <div id="a5" class="collapse" aria-labelledby="q5" data-parent="#faqAccordion">
            <div class="card-body">
                <p style="color: white"><?= $this->ContentBlock->html('faq-a5'); ?></p>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header" id="q6">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left collapsed" type="button"
                        data-toggle="collapse" data-target="#a6" aria-expanded="false"
                        aria-controls="a6">
                    <?= $this->ContentBlock->text('faq-q6'); ?>
                </button>
            </h2>
        </div>
        <div id="a6" class="collapse" aria-labelledby="q6" data-parent="#faqAccordion">
            <div class="card-body">
                <p style="color: white"><?= $this->ContentBlock->html('faq-a6'); ?></p>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header" id="q7">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left collapsed" type="button"
                        data-toggle="collapse" data-target="#a7" aria-expanded="false"
                        aria-controls="a7">
                    <?= $this->ContentBlock->text('faq-q7'); ?>
                </button>
            </h2>
        </div>
        <div id="a7" class="collapse" aria-labelledby="q7" data-parent="#faqAccordion">
            <div class="card-body">
                <p style="color: white"><?= $this->ContentBlock->html('faq-a7'); ?></p>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header" id="q8">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left collapsed" type="button"
                        data-toggle="collapse" data-target="#a8" aria-expanded="false"
                        aria-controls="a8">
                    <?= $this->ContentBlock->text('faq-q8'); ?>
                </button>
            </h2>
        </div>
        <div id="a8" class="collapse" aria-labelledby="q8" data-parent="#faqAccordion">
            <div class="card-body">
                <p style="color: white"><?= $this->ContentBlock->html('faq-a8'); ?></p>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header" id="q9">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left collapsed" type="button"
                        data-toggle="collapse" data-target="#a9" aria-expanded="false"
                        aria-controls="a9">
                    <?= $this->ContentBlock->text('faq-q9'); ?>
                </button>
            </h2>
        </div>
        <div id="a9" class="collapse" aria-labelledby="q9" data-parent="#faqAccordion">
            <div class="card-body">
                <p style="color: white"><?= $this->ContentBlock->html('faq-a9'); ?></p>
        </div>
    </div>

    <div class="card">
        <div class="card-header" id="q10">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left collapsed" type="button"
                        data-toggle="collapse" data-target="#a10" aria-expanded="false"
                        aria-controls="a10">
                    <?= $this->ContentBlock->text('faq-q10'); ?>
                </button>
            </h2>
        </div>
        <div id="a10" class="collapse" aria-labelledby="q10" data-parent="#faqAccordion">
            <div class="card-body">
                <p style="color: white"><?= $this->ContentBlock->html('faq-a10'); ?></p>
            </div>
        </div>
    </div>
</div>
