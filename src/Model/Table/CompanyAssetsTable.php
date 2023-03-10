<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CompanyAssets Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\InsuranceCompaniesTable&\Cake\ORM\Association\BelongsTo $InsuranceCompanies
 * @property \App\Model\Table\InsurancePoliciesTable&\Cake\ORM\Association\BelongsTo $InsurancePolicies
 *
 * @method \App\Model\Entity\CompanyAsset newEmptyEntity()
 * @method \App\Model\Entity\CompanyAsset newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CompanyAsset[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CompanyAsset get($primaryKey, $options = [])
 * @method \App\Model\Entity\CompanyAsset findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CompanyAsset patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CompanyAsset[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CompanyAsset|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CompanyAsset saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CompanyAsset[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CompanyAsset[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CompanyAsset[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CompanyAsset[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CompanyAssetsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('company_assets');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('ContactListings', [
            'foreignKey' => 'contact_listing_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('InsuranceCompanies', [
            'foreignKey' => 'insurance_company_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('InsurancePolicies', [
            'foreignKey' => 'insurance_policy_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->integer('contact_listing_id')
            ->notEmptyString('contact_listing_id');

        // $validator
        //     ->integer('insurance_company_id')
        //     ->notEmptyString('insurance_company_id');

        // $validator
        //     ->integer('insurance_policy_id')
        //     ->notEmptyString('insurance_policy_id');

        $validator
            ->numeric('premium')
            ->requirePresence('premium', 'create')
            ->notEmptyString('premium');

        // $validator
        //     ->dateTime('term_length')
        //     ->requirePresence('term_length', 'create')
        //     ->notEmptyDateTime('term_length');

        $validator
            ->scalar('status')
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->scalar('deleted')
            ->requirePresence('deleted', 'create')
            ->notEmptyString('deleted');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn('contact_listing_id', 'ContactListings'), ['errorField' => 'contact_listing_id']);
        $rules->add($rules->existsIn('insurance_company_id', 'InsuranceCompanies'), ['errorField' => 'insurance_company_id']);
        $rules->add($rules->existsIn('insurance_policy_id', 'InsurancePolicies'), ['errorField' => 'insurance_policy_id']);

        return $rules;
    }
}
