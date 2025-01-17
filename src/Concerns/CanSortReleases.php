<?php

namespace MarkWalet\Changelog\Concerns;

trait CanSortReleases
{
    /**
     * Sort the given version numbers.
     *
     * @param string[]|array $versions
     * @return string[]|array
     */
    public function sortVersions(array $versions): array
    {
        if (count($versions) > 1) {
            // Sort all items.
            usort($versions, function (string $first, string $second) {
                if ($first === 'unreleased') {
                    return -1;
                }

                if ($second === 'unreleased') {
                    return 1;
                }

                return -version_compare($first, $second);
            });
        }

        return $versions;
    }
}
