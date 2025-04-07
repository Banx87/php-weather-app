<?php if (isset($info)) {
    $weatherType = $info->weatherType;
    $temperatureKelvin = $info->temperatureKelvin;
    $city = $info->city;
} else {
    $weatherType = 'sunny';
    $city = 'Unknown City';
    $temperatureKelvin = 0;
} ?>

<div class="app-container" style="background-image: url('images/SVG/<?php echo e($weatherType) ?>/bg.svg')">
    <div class="top-bar">
        <div class="top-bar_location poppins-extralight">
            <svg viewBox="0 0 52.7624 72.774" class="icon location_icon">
                <path
                    d="m45.0353,7.7268h0c-10.3024-10.3024-27.0058-10.3024-37.3081,0h0C-1.2832,16.7371-2.5652,30.9001,4.6807,41.3819l21.7006,31.392,21.7006-31.392c7.2459-10.4818,5.9638-24.6448-3.0465-33.6551Zm-18.6541,32.3037c-7.5383,0-13.6492-6.111-13.6492-13.6492s6.111-13.6493,13.6492-13.6493,13.6492,6.111,13.6492,13.6493-6.111,13.6492-13.6492,13.6492Z"
                    style="fill: currentColor" />
            </svg><?php echo e($city) ?>;
        </div>
        <div class="top-bar_date poppins-regular">
            <?php echo $info->getFormattedDate(); ?>
        </div>
    </div>
    <div class="weather-info">
        <img src="images/SVG/<?php echo e($weatherType) ?>/large.svg" class="weather-info-img"
            alt="<?php echo e($weatherType) ?>" />
    </div>
    <h1 class="weather-info_temperature poppins-light">
        <?php echo e($info->getCelsius()) ?>°
        <span>/</span>
        <?php echo e($info->getFahrenheit()) ?>F
    </h1>
    <p class="weather-info_description poppins-extralight">
        <?php echo file_get_contents(__DIR__ . '/../../images/SVG/icons/' . e($weatherType) . '.svg'); ?>
        <?php echo e($weatherType) ?>
    </p>
</div>