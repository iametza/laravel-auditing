<?php

namespace OwenIt\Auditing\Tests;

use Mockery;
use OwenIt\Auditing\AuditableObserver;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Facades\Auditor;

class AuditableObserverTest extends AbstractTestCase
{
    /**
     * Test the AuditableObserver class instantiation.
     *
     * @return AuditableObserver
     */
    public function testAuditableObserverInstantiation()
    {
        $observer = new AuditableObserver();

        $this->assertInstanceOf(AuditableObserver::class, $observer);

        return $observer;
    }

    /**
     * Test Auditable class mock.
     *
     * @return Auditable
     */
    public function testAuditableMock()
    {
        $model = Mockery::mock(Auditable::class);

        $this->assertInstanceOf(Auditable::class, $model);

        return $model;
    }

    /**
     * Test AuditableObserver created method to PASS.
     *
     * @depends testAuditableObserverInstantiation
     * @depends testAuditableMock
     *
     * @param AuditableObserver $observer
     * @param Auditable         $model
     *
     * @return void
     */
    public function testAuditableObserverCreatedPass(AuditableObserver $observer, Auditable $model)
    {
        Auditor::shouldReceive('execute')
            ->once()
            ->with($model);

        $model->shouldReceive('setAuditEvent')
            ->with('created')
            ->andReturn($model);

        $observer->created($model);
    }

    /**
     * Test AuditableObserver updated method to PASS.
     *
     * @depends testAuditableObserverInstantiation
     * @depends testAuditableMock
     *
     * @param AuditableObserver $observer
     * @param Auditable         $model
     *
     * @return void
     */
    public function testAuditableObserverUpdatedPass(AuditableObserver $observer, Auditable $model)
    {
        Auditor::shouldReceive('execute')
            ->once()
            ->with($model);

        $model->shouldReceive('setAuditEvent')
            ->with('updated')
            ->andReturn($model);

        $observer->updated($model);
    }

    /**
     * Test AuditableObserver deleted method to PASS.
     *
     * @depends testAuditableObserverInstantiation
     * @depends testAuditableMock
     *
     * @param AuditableObserver $observer
     * @param Auditable         $model
     *
     * @return void
     */
    public function testAuditableObserverDeletedPass(AuditableObserver $observer, Auditable $model)
    {
        Auditor::shouldReceive('execute')
            ->once()
            ->with($model);

        $model->shouldReceive('setAuditEvent')
            ->with('deleted')
            ->andReturn($model);

        $observer->deleted($model);
    }

    /**
     * Test AuditableObserver restored method to PASS.
     *
     * @depends testAuditableObserverInstantiation
     * @depends testAuditableMock
     *
     * @param AuditableObserver $observer
     * @param Auditable         $model
     *
     * @return void
     */
    public function testAuditableObserverRestoredPass(AuditableObserver $observer, Auditable $model)
    {
        Auditor::shouldReceive('execute')
            ->once()
            ->with($model);

        $model->shouldReceive('setAuditEvent')
            ->with('restored')
            ->andReturn($model);

        $observer->restored($model);
    }
}