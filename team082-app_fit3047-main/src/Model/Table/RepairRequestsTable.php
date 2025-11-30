<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RepairRequests Model
 */
class RepairRequestsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('repair_requests');
        $this->setDisplayField('customer_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('customer_name')
            ->maxLength('customer_name', 100)
            ->requirePresence('customer_name', 'create')
            ->notEmptyString('customer_name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('address')
            ->maxLength('address', 255)
            ->requirePresence('address', 'create')
            ->notEmptyString('address');

        $validator
            ->scalar('suburb')
            ->maxLength('suburb', 100)
            ->requirePresence('suburb', 'create')
            ->notEmptyString('suburb');

        $validator
            ->scalar('brand_name')
            ->maxLength('brand_name', 255)
            ->allowEmptyString('brand_name');

        $validator
            ->scalar('equipment_category')
            ->inList('equipment_category', ['free weight', 'cardio', 'machine'], 'Please select a valid category')
            ->allowEmptyString('equipment_category'); // or make required if needed

        $validator
            ->scalar('equipment_type')
            ->maxLength('equipment_type', 255)
            ->allowEmptyString('equipment_type');

        $validator
            ->dateTime('preferred_datetime')
            ->requirePresence('preferred_datetime', 'create')
            ->notEmptyDateTime('preferred_datetime');

        return $validator;
    }
}
