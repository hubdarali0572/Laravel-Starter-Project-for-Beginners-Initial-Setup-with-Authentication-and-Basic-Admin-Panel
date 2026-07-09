<?php
if (!function_exists('active_class')) {
    function active_class($routeNames, $class = 'active')
    {
        // Make sure $routeNames is an array
        $routeNames = (array) $routeNames;

        foreach ($routeNames as $route) {
            if (request()->routeIs($route)) {
                return $class;
            }
        }

        return '';
    }
}

if (!function_exists('activity_log_record')) {
    /**
     * Extract readable record details from a Spatie activity log entry.
     */
    function activity_log_record(\Spatie\Activitylog\Models\Activity $log): array
    {
        $properties = $log->properties instanceof \Illuminate\Support\Collection
            ? $log->properties
            : collect($log->properties ?? []);

        $attributes = collect($properties->get('attributes', []));
        $old = collect($properties->get('old', []));
        $action = $log->description ?: ($log->event ?? 'updated');

        $record = match ($action) {
            'deleted' => $old,
            'updated' => $attributes->isNotEmpty() ? $attributes : $old,
            default => $attributes,
        };

        if ($record->isEmpty() && $action === 'deleted') {
            $record = collect($properties->except(['ip', 'user_type', 'attributes', 'old']));
        }

        $name = $record->get('name');
        $email = $record->get('email');
        $resource = class_basename($log->subject_type ?? 'Record');

        return [
            'action' => $action,
            'name' => $name ?: '—',
            'email' => $email ?: '—',
            'user_type' => $record->get('user_type') ?: ($properties->get('user_type') ?: '—'),
            'ip' => $properties->get('ip') ?: '—',
            'module' => $log->log_name ?: strtolower($resource),
            'resource' => $resource,
            'resource_id' => $log->subject_id,
            'label' => $name ?: ($resource . ' #' . $log->subject_id),
        ];
    }
}

if (!function_exists('activity_log_action_badge')) {
    function activity_log_action_badge(string $action): string
    {
        return match ($action) {
            'created' => 'admin-badge-success',
            'updated' => 'admin-badge-warning',
            'deleted' => 'admin-badge-danger',
            default => 'admin-badge-secondary',
        };
    }
}
