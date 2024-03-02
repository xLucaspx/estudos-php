<?php

class FiltroDecode extends php_user_filter
{
	public $stream;
	private $previousData;

	public function onCreate(): bool
	{
		$this->stream = fopen('php://temp', 'w+');
		return $this->stream !== false;
	}

	public function filter($in, $out, &$consumed, $closing): int
	{
		$saida = '';

		while ($bucket = stream_bucket_make_writeable($in)) {
			if ($closing && !$bucket->datalen) {
				return PSFS_FEED_ME;
			}
			$consumed += $bucket->datalen;

			$stringFromBucket = $bucket->data;

			if (!empty($this->previousData)) {
				$stringFromBucket = $this->previousData . $bucket->data;
				$this->previousData = null;
			}

			if ($stringFromBucket[-1] !== "\n") {
				$this->previousData = $stringFromBucket;
				return PSFS_FEED_ME;
			}

			$linhas = explode(PHP_EOL, $stringFromBucket);

			foreach ($linhas as $linha) {
				$saida .= mb_convert_encoding($linha, 'utf-8', 'iso-8859-1');
			}
		}

		$bucketSaida = stream_bucket_new($this->stream, $saida);
		stream_bucket_append($out, $bucketSaida);

		return PSFS_PASS_ON;
	}
}
