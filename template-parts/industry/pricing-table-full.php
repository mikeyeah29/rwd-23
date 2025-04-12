<?php

$tickColor = '#26c45d';

$packages = [
    [
        'name' => 'Starter Site',
        'tagline' => '"Essentials Package"',
        'price' => '£500',
        'features' => [
            'Ideal for' => 'Therapists or coaches who need a professional website to establish their online presence.',
            'Design Approach' => 'Pre-designed template with minor customization',
            'Pages' => '3 (Home, About, Contact)',
            'Mobile-Responsive Design' => true,
            'SEO Setup' => 'Basic SEO (keywords, meta descriptions)',
            'Blog Integration' => false,
            'Google Analytics Setup' => false,
            'Email Capture Form' => false,
            'Online Booking Integration' => false,
            'Payment Integration' => false,
        ],
        'cta_id' => 'lite',
    ],
    [
        'name' => 'Growth Site',
        'tagline' => '"Client Growth Package"',
        'price' => '£950',
        'features' => [
            'Ideal for' => 'Established therapists ready to grow their client base and engage through content and bookings.',
            'Design Approach' => 'Semi-customized template tailored to your brand',
            'Pages' => '5 (Home, About, Services, Blog, Contact)',
            'Mobile-Responsive Design' => true,
            'SEO Setup' => 'SEO for 3 Pages',
            'Blog Integration' => true,
            'Google Analytics Setup' => true,
            'Email Capture Form' => true,
            'Online Booking Integration' => true,
            'Payment Integration' => false,
        ],
        'cta_id' => 'pro',
    ],
    [
        'name' => 'Premium Site',
        'tagline' => '"Leadership Package"',
        'price' => 'From £1,500',
        'features' => [
            'Ideal for' => 'Therapists / coaches wanting a full-featured website to position themselves as leaders.',
            'Design Approach' => 'Fully bespoke design, crafted to reflect your brand\'s authority',
            'Pages' => '7 (Home, About, Services, Blog, Resources, Testimonials, Contact)',
            'Mobile-Responsive Design' => true,
            'SEO Setup' => 'Advanced SEO Across the Site',
            'Blog Integration' => true,
            'Google Analytics Setup' => true,
            'Email Capture Form' => true,
            'Online Booking Integration' => true,
            'Payment Integration' => true, // e.g., Stripe, PayPal
        ],
        'cta_id' => 'premium',
    ],
];

$svgTick = '<svg fill="' . $tickColor . '" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path d="M5.48 10.089l1.583-1.464c1.854.896 3.028 1.578 5.11 3.063 3.916-4.442 6.503-6.696 11.311-9.688l.516 1.186c-3.965 3.46-6.87 7.314-11.051 14.814-2.579-3.038-4.301-4.974-7.469-7.911zm14.407.557c.067.443.113.893.113 1.354 0 4.962-4.038 9-9 9s-9-4.038-9-9 4.038-9 9-9c1.971 0 3.79.644 5.274 1.723.521-.446 1.052-.881 1.6-1.303-1.884-1.511-4.271-2.42-6.874-2.42-6.075 0-11 4.925-11 11s4.925 11 11 11 11-4.925 11-11c0-1.179-.19-2.313-.534-3.378-.528.633-1.052 1.305-1.579 2.024z"></path></svg>';

$svgCross = '<i class="features-cross"></i>';

?>

<div class="container pt-5">

    <p class="font-heading txt-secondary mb-0 text-center">Pricing</p>
    <h2 class="text-center mb-4 hdln-2 txt-dark">Website Packages</h2>

    <div class="package-table package-table--industry" data-aos="fade-up" data-aos-duration="800">

        <table>
          <thead>
              <tr>
                  <th class="package-table-service-cell"></th>
                  <?php foreach ($packages as $package): ?>
                      <th class="package-table-heading <?php echo $package['cta_id'] === 'pro' ? 'package-table-heading-selected' : ''; ?>">
                          <?php echo $package['name']; ?>
                          <p><?php echo $package['tagline']; ?></p>
                          <p class="price"><?php echo $package['price']; ?></p>
                      </th>
                  <?php endforeach; ?>
              </tr>
          </thead>
          <tbody>
              <?php
              // Get unique features across all packages
              $allFeatures = array_keys(call_user_func_array('array_merge', array_column($packages, 'features')));
              foreach ($allFeatures as $feature): ?>
                  <tr>
                      <td class="package-table-service-cell d-flex align-items-center">
                          <?php echo $feature; ?>
                      </td>
                      <?php foreach ($packages as $package): ?>
                          <td class="package-table-cell <?php echo $package['cta_id'] === 'pro' ? 'package-table-cell-selected' : ''; ?>">
                              <?php
                              if (isset($package['features'][$feature])) {
                                  echo is_bool($package['features'][$feature]) ? ($package['features'][$feature] ? $svgTick : $svgCross) : $package['features'][$feature];
                              } else {
                                  echo $svgCross;
                              }
                              ?>
                          </td>
                      <?php endforeach; ?>
                  </tr>
              <?php endforeach; ?>
              <tr>
                  <td></td>
                  <?php foreach ($packages as $package): ?>
                      <td class="text-center">
                          <!-- <div onclick="selectPackage('#contact-packages', '<?php echo $package['cta_id']; ?>')" class="package-btn <?php echo $package['cta_id'] === 'pro' ? 'is-selected' : ''; ?>">
                              Get Started
                          </div> -->
                          <div class="book-a-call cursor-pointer package-btn <?php echo $package['cta_id'] === 'pro' ? 'is-selected' : ''; ?>">
                              Get Started
                          </div>
                      </td>
                  <?php endforeach; ?>
              </tr>
          </tbody>
        </table>

    </div>

</div>
