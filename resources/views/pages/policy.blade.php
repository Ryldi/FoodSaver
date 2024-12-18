@extends('layouts.master')

@section('content')
<div class="bg-neutral text-primary relative mt-20 py-10">
    <div class="container mx-auto px-4">
        <h1 class="text-primary text-4xl font-bold text-center mb-8">@lang('policy.title')</h1>
        
        <div class="space-y-8">
            <!-- 1. Background and Purpose -->
            <section>
                <h2 class="text-2xl font-semibold text-primary mb-4">@lang('policy.back_and_purpose')</h2>
                <p class="text-primary leading-relaxed">@lang('policy.back_and_purpose_content')</p>
            </section>

            <!-- 2. Definition of Surplus Food -->
            <section>
                <h2 class="text-2xl font-semibold text-primary mb-4">@lang('policy.waste_food_definition')</h2>
                <ul class="list-disc pl-6 text-primary">
                    @foreach(__('policy.waste_food_definition_content') as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </section>

            <!-- 3. Safety and Quality -->
            <section>
                <h2 class="text-2xl font-semibold text-primary mb-4">@lang('policy.safety_and_quality')</h2>
                <p class="text-primary leading-relaxed">@lang('policy.safety_and_quality_content')</p>
                <ul class="list-disc pl-6 text-primary">
                    @foreach(__('policy.safety_and_quality_details') as $detail)
                        <li>{{ $detail }}</li>
                    @endforeach
                </ul>
            </section>

            <!-- 4. Consumer Responsibility -->
            <section>
                <h2 class="text-2xl font-semibold text-primary mb-4">@lang('policy.consumer_responsibility')</h2>
                <p class="text-primary leading-relaxed">@lang('policy.consumer_responsibility_content')</p>
                <ul class="list-disc pl-6 text-primary">
                    @foreach(__('policy.consumer_responsibility_details') as $detail)
                        <li>{{ $detail }}</li>
                    @endforeach
                </ul>
            </section>

            <!-- 5. Return and Refund -->
            <section>
                <h2 class="text-2xl font-semibold text-primary mb-4">@lang('policy.return_and_refund')</h2>
                <p class="text-primary leading-relaxed">@lang('policy.return_and_refund_content')</p>
                <p class="text-primary leading-relaxed">@lang('policy.refund_time')</p>
            </section>

            <!-- 6. Pricing Policy -->
            <section>
                <h2 class="text-2xl font-semibold text-primary mb-4">@lang('policy.pricing_policy')</h2>
                <p class="text-primary leading-relaxed">@lang('policy.pricing_policy_content')</p>
            </section>

            <!-- 7. Environmental Commitment -->
            <section>
                <h2 class="text-2xl font-semibold text-primary mb-4">@lang('policy.environment_commitment')</h2>
                <p class="text-primary leading-relaxed">@lang('policy.environment_commitment_content')</p>
            </section>

            <!-- 8. Privacy and Data Security -->
            <section>
                <h2 class="text-2xl font-semibold text-primary mb-4">@lang('policy.privacy_and_security')</h2>
                <p class="text-primary leading-relaxed">@lang('policy.privacy_and_security_content')</p>
            </section>

            <!-- 9. Policy Changes -->
            <section>
                <h2 class="text-2xl font-semibold text-primary mb-4">@lang('policy.policy_changes')</h2>
                <p class="text-primary leading-relaxed">@lang('policy.policy_changes_content')</p>
            </section>
        </div>
    </div>
</div>

<style>
    body {
        overflow-x: hidden;
    }
</style>
@endsection
