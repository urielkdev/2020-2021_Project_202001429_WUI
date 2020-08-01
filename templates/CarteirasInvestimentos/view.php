<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CarteirasInvestimento $carteirasInvestimento
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Carteiras Investimento'), ['action' => 'edit', $carteirasInvestimento->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Carteiras Investimento'), ['action' => 'delete', $carteirasInvestimento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $carteirasInvestimento->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Carteiras Investimentos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Carteiras Investimento'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="carteirasInvestimentos view content">
            <h3><?= h($carteirasInvestimento->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Usuario') ?></th>
                    <td><?= $carteirasInvestimento->has('usuario') ? $this->Html->link($carteirasInvestimento->usuario->nome, ['controller' => 'Usuarios', 'action' => 'view', $carteirasInvestimento->usuario->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($carteirasInvestimento->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Descricao') ?></th>
                    <td><?= h($carteirasInvestimento->descricao) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($carteirasInvestimento->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Indicadores Carteiras') ?></h4>
                <?php if (!empty($carteirasInvestimento->indicadores_carteiras)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Carteiras Investimento Id') ?></th>
                            <th><?= __('Periodo Meses') ?></th>
                            <th><?= __('Data Final') ?></th>
                            <th><?= __('Rentabilidade') ?></th>
                            <th><?= __('Desvio Padrao') ?></th>
                            <th><?= __('Num Valores') ?></th>
                            <th><?= __('Rentab Min') ?></th>
                            <th><?= __('Rentab Max') ?></th>
                            <th><?= __('Max Drawdown') ?></th>
                            <th><?= __('Tipo Benchmark Id') ?></th>
                            <th><?= __('Meses Acima Bench') ?></th>
                            <th><?= __('Sharpe') ?></th>
                            <th><?= __('Beta') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($carteirasInvestimento->indicadores_carteiras as $indicadoresCarteiras) : ?>
                        <tr>
                            <td><?= h($indicadoresCarteiras->carteiras_investimento_id) ?></td>
                            <td><?= h($indicadoresCarteiras->periodo_meses) ?></td>
                            <td><?= h($indicadoresCarteiras->data_final) ?></td>
                            <td><?= h($indicadoresCarteiras->rentabilidade) ?></td>
                            <td><?= h($indicadoresCarteiras->desvio_padrao) ?></td>
                            <td><?= h($indicadoresCarteiras->num_valores) ?></td>
                            <td><?= h($indicadoresCarteiras->rentab_min) ?></td>
                            <td><?= h($indicadoresCarteiras->rentab_max) ?></td>
                            <td><?= h($indicadoresCarteiras->max_drawdown) ?></td>
                            <td><?= h($indicadoresCarteiras->tipo_benchmark_id) ?></td>
                            <td><?= h($indicadoresCarteiras->meses_acima_bench) ?></td>
                            <td><?= h($indicadoresCarteiras->sharpe) ?></td>
                            <td><?= h($indicadoresCarteiras->beta) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'IndicadoresCarteiras', 'action' => 'view', $indicadoresCarteiras->carteiras_investimento_id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'IndicadoresCarteiras', 'action' => 'edit', $indicadoresCarteiras->carteiras_investimento_id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'IndicadoresCarteiras', 'action' => 'delete', $indicadoresCarteiras->carteiras_investimento_id], ['confirm' => __('Are you sure you want to delete # {0}?', $indicadoresCarteiras->carteiras_investimento_id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Rel Carteiras Operacoes') ?></h4>
                <?php if (!empty($carteirasInvestimento->rel_carteiras_operacoes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Carteiras Investimento Id') ?></th>
                            <th><?= __('Operacoes Financeira Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($carteirasInvestimento->rel_carteiras_operacoes as $relCarteirasOperacoes) : ?>
                        <tr>
                            <td><?= h($relCarteirasOperacoes->carteiras_investimento_id) ?></td>
                            <td><?= h($relCarteirasOperacoes->operacoes_financeira_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'RelCarteirasOperacoes', 'action' => 'view', $relCarteirasOperacoes->carteiras_investimento_id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'RelCarteirasOperacoes', 'action' => 'edit', $relCarteirasOperacoes->carteiras_investimento_id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'RelCarteirasOperacoes', 'action' => 'delete', $relCarteirasOperacoes->carteiras_investimento_id], ['confirm' => __('Are you sure you want to delete # {0}?', $relCarteirasOperacoes->carteiras_investimento_id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
