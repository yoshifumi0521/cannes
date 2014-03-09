<?php

sfMixer::register('sfComponent', array('sfSslRequirementActionMixin', 'sslRequired'));
sfMixer::register('sfComponent', array('sfSslRequirementActionMixin', 'sslAllowed'));
sfMixer::register('sfComponent', array('sfSslRequirementActionMixin', 'getSslUrl'));
sfMixer::register('sfComponent', array('sfSslRequirementActionMixin', 'getNonSslUrl'));