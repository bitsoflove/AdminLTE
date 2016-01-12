<style>
    li.error {
        border-top-color: #dd4b39 !important;
    }
</style>

<?php $prefix = isset($prefix) ? $prefix."_" : ""; ?>


@if(!is_module_enabled('Site'))
    <?php if (count(LaravelLocalization::getSupportedLocales()) > 1): ?>
    <ul class="nav nav-tabs">
        <?php $i = 0; ?>
        <?php foreach (LaravelLocalization::getSupportedLocales() as $locale => $language): ?>
            <?php $i ++; ?>
            <?php $class = ''; ?>
            <?php foreach ($errors->getMessages() as $field => $messages): ?>
                <?php if (substr($field, 0, strpos($field, ".")) == $locale) $class = 'error' ?>
            <?php endforeach ?>
            <li class="{{ App::getLocale() == $locale ? 'active' : '' }} {{ $class }}">
                <a href="#tab_{{ $prefix.$i }}" data-toggle="tab">{{ trans('core::core.tab.'. strtolower($language['name'])) }}</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>
@else
    <ul class="nav nav-tabs">
        @foreach(\Site::current()->siteLocales->lists('title', 'locale')->toArray() as $locale => $title)
            <?php $class = ''; ?>
            <?php foreach ($errors->getMessages() as $field => $messages): ?>
                    <?php if (substr($field, 0, strpos($field, ".")) == $locale) $class = 'error' ?>
                <?php endforeach ?>
            <li class="{{ App::getLocale() == $locale ? 'active' : '' }} {{ $class }}">
                <a href="#tab_{{ $prefix.$locale }}" data-toggle="tab">{{ trans('core::core.tab.'.  $locale) }}</a>
            </li>
        @endforeach
    </ul>
@endif
