<?php

// $faqs = [
//     [
//         "question" => "How long does it take to build my website?",
//         "answer" => "It typically takes 1-4 weeks to complete your website, depending on the package you choose and how quickly you provide the necessary content. I’ll keep you updated every step of the way."
//     ],
//     [
//         "question" => "Will my website work on mobile devices?",
//         "answer" => "Absolutely! All my websites are fully mobile-responsive, meaning they’ll look and function great on any device—desktop, tablet, or smartphone."
//     ],
//     [
//         "question" => "Can I update my website myself after it’s finished?",
//         "answer" => "Yes! I use WordPress, which is user-friendly and allows you to easily update content, images, or blog posts. I’ll also provide a quick tutorial if needed."
//     ],
//     [
//         "question" => "Do you offer ongoing support after the website is launched?",
//         "answer" => "Yes! I offer an optional hosting and maintenance package for £30/month, which includes updates, backups, and security monitoring. You can focus on your clients while I handle the tech."
//     ],
//     [
//         "question" => "What if I don’t have any content or images for my website?",
//         "answer" => "No problem! I can guide you on the type of content you need, and I can recommend stock images or design placeholders while you finalize your content."
//     ],
//     [
//         "question" => "Do you offer SEO services?",
//         "answer" => "Yes! All packages include basic SEO setup, such as optimizing keywords, meta descriptions, and page titles. For more advanced SEO needs, I can discuss additional options."
//     ],
//     [
//         "question" => "What happens if I need additional features later on?",
//         "answer" => "I can help you add features or make updates as your business grows. My hourly rate for additional development is £40, or you can choose a package with ongoing support at a discounted rate."
//     ],
//     [
//         "question" => "What if I already have a website but need a redesign?",
//         "answer" => "I can redesign your existing website to modernize it and improve its functionality while keeping any content you want to retain. Let’s discuss your needs during a free consultation."
//     ]
// ];

$attrs = $args['attributes'];
$content = $args['content'];

$style = (isset($attrs['style']) ? $attrs['style'] : []);
$padding_classes = RWD_GutenbergHelpers::get_padding_classes($style);

$color_classes = RWD_GutenbergHelpers::get_color_classes($attrs);

?>

<section class="faq-section py-5 <?php echo $padding_classes; ?> <?php echo $color_classes; ?>">
    <div class="container">

        <div class="faq-container">
            <?php echo $content; ?>
        </div>

    </div>
</section>

<script>
  
    document.querySelectorAll('.faq-question').forEach(button => {
        button.addEventListener('click', () => {
        const faqItem = button.parentElement;

        // Close any open FAQ
        document.querySelectorAll('.faq-item').forEach(item => {
            if (item !== faqItem) {
            item.classList.remove('active');
            }
        });

        // Toggle the current FAQ
        faqItem.classList.toggle('active');
        });
    });

</script>
