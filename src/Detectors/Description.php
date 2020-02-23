<?php
declare(strict_types = 1);

namespace Embed\Detectors;

class Description extends Detector
{
    public function detect(): ?string
    {
        $oembed = $this->extractor->getOEmbed();
        $document = $this->extractor->getDocument();
        $ld = $this->extractor->getLinkedData();

        return $oembed->str('description')
            ?: $document->meta('og:description', 'twitter:description', 'lp:description', 'description')
            ?: $ld->str('description');
    }
}
